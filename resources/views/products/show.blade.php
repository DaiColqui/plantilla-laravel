<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ $product->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-xl mx-auto bg-white shadow-lg rounded-xl p-6">
        <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>
        <p class="text-gray-700 mb-2">Descripción: {{ $product->description }}</p>
        <p class="text-lg text-gray-800 font-semibold">Precio: ${{ number_format($product->price, 2) }}</p>
        <a href="{{ route('products.index') }}" class="text-blue-500 mt-4 inline-block">← Volver a la lista</a>
    </div>
</body>
</html>