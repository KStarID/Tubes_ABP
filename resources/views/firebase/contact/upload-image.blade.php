<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
</head>

<body>
    <h2>Upload Image</h2>

    @if (session('success'))
        <div style="color: green;">{{ session('success') }}</div>
        @if (session('imageUrl'))
            <img src="{{ session('imageUrl') }}" alt="Uploaded Image" style="max-width: 300px;">
        @endif
    @endif

    @if (session('error'))
        <div style="color: red;">{{ session('error') }}</div>
    @endif

    <form action="{{ route('upload.file') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" required>
        <button type="submit">Upload</button>
    </form>
</body>

</html>
