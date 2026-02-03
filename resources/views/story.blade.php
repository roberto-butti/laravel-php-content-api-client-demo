<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $story['name'] }}</title>
    <style>
        body {
            font-family: system-ui, -apple-system, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
            line-height: 1.6;
        }
        pre {
            background: #f4f4f4;
            padding: 1rem;
            border-radius: 4px;
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <h1>{{ $story['name'] }}</h1>
    <p><strong>Slug:</strong> {{ $story['full_slug'] }}</p>
    <p><strong>Created:</strong> {{ $story['created_at'] }}</p>

    <h2>Content</h2>
    <pre>{{ json_encode($story['content'], JSON_PRETTY_PRINT) }}</pre>
</body>
</html>
