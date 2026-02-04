@if(request()->has('_storyblok') || request()->has('_storyblok_tk'))
<script src="https://unpkg.com/idiomorph@0.7.4/dist/idiomorph.min.js"></script>
<script>
    (function() {
        const script = document.createElement('script')
        script.src = 'https://app.storyblok.com/f/storyblok-v2-latest.js'
        script.async = true
        script.onload = function() {
            const storyblokInstance = new window.StoryblokBridge()

            function debounce(fn, delay) {
                let timeoutId
                return function(...args) {
                    clearTimeout(timeoutId)
                    timeoutId = setTimeout(() => fn.apply(this, args), delay)
                }
            }

            const updatePreview = debounce(async (story) => {
                try {
                    const response = await fetch('/api/preview', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({ story }),
                    })
                    const html = await response.text()
                    const parser = new DOMParser()
                    const doc = parser.parseFromString(html, 'text/html')
                    const newMain = doc.querySelector('main')
                    const currentMain = document.querySelector('main')

                    if (newMain && currentMain) {
                        // Use idiomorph to morph only the changed parts of the DOM
                        Idiomorph.morph(currentMain, newMain, {
                            morphStyle: 'innerHTML',
                            ignoreActiveValue: true,
                            head: { style: 'merge' }
                        })
                    }
                } catch (error) {
                    console.error('Preview error:', error)
                }
            }, 300)

            storyblokInstance.on('input', (event) => {
                if (event.story) {
                    updatePreview(event.story)
                }
            })

            storyblokInstance.on(['published', 'change'], () => {
                window.location.reload()
            })
        }
        document.head.appendChild(script)
    })()
</script>
@endif
