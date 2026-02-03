@if(request()->has('_storyblok') || request()->has('_storyblok_tk'))
<script>
    (function() {
        const script = document.createElement('script')
        script.src = 'https://app.storyblok.com/f/storyblok-v2-latest.js'
        script.async = true
        script.onload = function() {
            const storyblokInstance = new window.StoryblokBridge()
            storyblokInstance.on(['published', 'change'], () => {
                window.location.reload()
            })
        }
        document.head.appendChild(script)
    })()
</script>
@endif
