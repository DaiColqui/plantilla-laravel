<div class="p-6 m-4 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
    <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-200">
        Lista de Productos
    </h2>

    <!-- Filtros -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-4">
        <!-- Buscador -->
        <div class="flex gap-2">
            <input type="text" wire:model.debounce.500ms="search" placeholder="Buscar producto..." class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white" />
        </div>

        <!-- Filtro por marca -->
        <div class="w-full md:w-1/3">
            <select wire:model.lazy="brand_id"
                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                <option value="">-- Todas las marcas --</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    @if ($mis_productos->count())
        <!-- Grilla de productos -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($mis_productos as $producto)
                <div
                    class="bg-white dark:bg-gray-700 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-200 dark:border-gray-600 transform hover:-translate-y-1">
                    <!-- Imagen -->
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('storage/' . $producto->image_url) }}" alt="{{ $producto->name }}"
                            class="w-full h-56 object-cover transition-transform duration-300 hover:scale-105">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>

                    <!-- Contenido -->
                    <div class="p-5 flex flex-col h-48">
                        <!-- Marca -->
                        <p
                            class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed mb-4 flex-grow overflow-hidden">
                            {{ Str::limit($producto->brand->name, 80) }}
                        </p>

                        <!-- Nombre -->
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 leading-tight">
                            {{ Str::limit($producto->name, 50) }}
                        </h3>

                        <!-- Descripción -->
                        <p
                            class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed mb-4 flex-grow overflow-hidden">
                            {{ Str::limit($producto->description, 80) }}
                        </p>

                        <!-- Precio y botón -->
                        <div
                            class="flex items-center justify-between mt-auto pt-3 border-t border-gray-100 dark:border-gray-600">
                            <span class="text-2xl font-bold text-blue-600 dark:text-blue-400">
                                ${{ number_format($producto->price, 0, ',', '.') }}
                            </span>
                            <button
                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200 shadow-md hover:shadow-lg">
                                Ver más
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Paginación -->
        <div class="mt-8">
            {{ $mis_productos->links() }}
        </div>
    @else
        <!-- Sin resultados -->
        <div class="text-center py-12">
            <div
                class="mx-auto w-24 h-24 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mb-4">
                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 7l-8-4-8 4m16 0l-8 4-8-4m16 0v10l-8 4-8-4V7"></path>
                </svg>
            </div>
            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">No hay productos</h3>
            <p class="text-gray-600 dark:text-gray-300">No hay productos para mostrar en este momento.</p>
        </div>
    @endif
</div>
