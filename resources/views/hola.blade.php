<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello World</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-lg rounded-2xl p-8 max-w-md text-center">
        <h1 class="text-4xl font-bold text-blue-600 mb-4">Hello World</h1>
        <p class="text-lg text-gray-700">¿Qué tal <span class="font-semibold text-black">{{$name}}</span>?</p>
    </div>
</body>
</html>