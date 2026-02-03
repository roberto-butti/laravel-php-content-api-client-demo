<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $story['name'] }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-base-200">
    <div class="container mx-auto p-8">
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <h1 class="card-title text-3xl">{{ $story['name'] }}</h1>

                <div class="divider"></div>

                <div class="flex flex-wrap gap-4">
                    <div class="badge badge-primary">{{ $story['full_slug'] }}</div>
                    <div class="badge badge-ghost">{{ $story['created_at'] }}</div>
                </div>

                <div class="divider"></div>

                <h2 class="text-xl font-semibold">Content</h2>
                <div class="mockup-code">
                    <pre class="px-4 overflow-x-auto"><code>{{ json_encode($story['content'], JSON_PRETTY_PRINT) }}</code></pre>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
