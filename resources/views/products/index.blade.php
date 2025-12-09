@extends('layouts.app')

@section('title', 'Inventario - Pyme360')

@section('head')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
@endsection

@section('content')
    <div class="container mx-auto px-4 py-8" x-data="productManager()">

        <!-- Header con buscador y botón Nuevo -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
            <h1 class="text-3xl font-bold text-gray-800">📦 Inventario Ferretería</h1>

            <form action="{{ route('products.index') }}" method="GET" class="flex gap-2 w-full md:w-1/2">
                <input type="text" name="buscar" placeholder="Buscar por nombre o código..."
                    class="w-full px-4 py-2 rounded shadow border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ request('buscar') }}">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow">
                    Buscar
                </button>
            </form>

            <!-- Botón Nuevo - ahora con funcionalidad -->
            <button @click="openModal()"
                class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow whitespace-nowrap flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Nuevo Producto
            </button>
        </div>

        <!-- Mensajes de éxito/error -->
        <div x-show="message" x-cloak x-transition class="mb-4 p-4 rounded-lg"
            :class="messageType === 'success' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'">
            <p x-text="message"></p>
        </div>

        <!-- Tabla de productos -->
        <div class="bg-white shadow-md rounded my-6 overflow-x-auto">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th
                            class="px-5 py-3 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            SKU</th>
                        <th
                            class="px-5 py-3 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Producto</th>
                        <th
                            class="px-5 py-3 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Precio</th>
                        <th
                            class="px-5 py-3 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="hover:bg-gray-50">
                            <td class="px-5 py-4 border-b border-gray-200 text-sm font-mono text-gray-600">
                                {{ $product->sku }}</td>
                            <td class="px-5 py-4 border-b border-gray-200 text-sm font-bold text-gray-800">
                                {{ $product->name }}</td>
                            <td class="px-5 py-4 border-b border-gray-200 text-sm text-green-600 font-bold">$
                                {{ number_format($product->price_sale, 0, ',', '.') }}</td>
                            <td class="px-5 py-4 border-b border-gray-200 text-sm">
                                @if ($product->stock < 5)
                                    <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs font-bold">Crítico:
                                        {{ $product->stock }}</span>
                                @else
                                    <span
                                        class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-bold">{{ $product->stock }}
                                        un.</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="p-4 bg-white border-t border-gray-200">
                {{ $products->links() }}
            </div>
        </div>

        <!-- Modal para crear producto -->
        <div x-show="showModal" x-cloak
            class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/70 backdrop-blur-sm"
            @click.self="closeModal()">
            <div class="bg-white rounded-3xl shadow-2xl w-full max-w-2xl p-8 m-4 max-h-[90vh] overflow-y-auto">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">➕ Nuevo Producto</h2>
                    <button @click="closeModal()" class="text-gray-500 hover:text-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </button>
                </div>

                <form @submit.prevent="saveProduct()" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- SKU -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">SKU *</label>
                            <input type="text" x-model="form.sku" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                placeholder="Ej: MAR-0001">
                        </div>

                        <!-- Nombre -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nombre del Producto *</label>
                            <input type="text" x-model="form.name" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                placeholder="Ej: Martillo Stanley Profesional">
                        </div>

                        <!-- Precio Costo -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Precio Costo *</label>
                            <input type="number" x-model="form.price_cost" required min="0"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                placeholder="5000">
                        </div>

                        <!-- Precio Venta -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Precio Venta *</label>
                            <input type="number" x-model="form.price_sale" required min="0"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                placeholder="7000">
                        </div>

                        <!-- Stock -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Stock Inicial *</label>
                            <input type="number" x-model="form.stock" required min="0"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                placeholder="50">
                        </div>

                        <!-- Stock Mínimo -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Stock Mínimo *</label>
                            <input type="number" x-model="form.stock_min" required min="0"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                placeholder="5">
                        </div>
                    </div>

                    <!-- Categoría -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Categoría *</label>
                        <select x-model="form.category" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                            <option value="">Seleccionar categoría...</option>
                            <option value="Herramientas Manuales">Herramientas Manuales</option>
                            <option value="Herramientas Eléctricas">Herramientas Eléctricas</option>
                            <option value="Fijaciones">Fijaciones</option>
                            <option value="Pinturas y Accesorios">Pinturas y Accesorios</option>
                            <option value="Plomería">Plomería</option>
                            <option value="Electricidad">Electricidad</option>
                            <option value="Seguridad">Seguridad</option>
                            <option value="Medición">Medición</option>
                            <option value="Adhesivos">Adhesivos</option>
                            <option value="Jardinería">Jardinería</option>
                        </select>
                    </div>

                    <!-- Descripción -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
                        <textarea x-model="form.description" rows="3"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                            placeholder="Descripción del producto..."></textarea>
                    </div>

                    <!-- Botones -->
                    <div class="flex gap-3 pt-4">
                        <button type="button" @click="closeModal()"
                            class="flex-1 bg-white text-gray-700 hover:bg-gray-50 font-bold py-3 px-4 rounded-lg border-2 border-gray-300">
                            Cancelar
                        </button>
                        <button type="submit" :disabled="loading"
                            class="flex-1 bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-4 rounded-lg disabled:opacity-50">
                            <span x-show="!loading">Guardar Producto</span>
                            <span x-show="loading">Guardando...</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function productManager() {
            return {
                // Estado del modal
                showModal: false,
                loading: false,
                message: '',
                messageType: 'success',

                // Formulario de producto
                form: {
                    sku: '',
                    name: '',
                    description: '',
                    price_cost: '',
                    price_sale: '',
                    stock: '',
                    stock_min: 5,
                    category: ''
                },

                // Abrir modal
                openModal() {
                    this.showModal = true;
                    this.resetForm();
                },

                // Cerrar modal
                closeModal() {
                    this.showModal = false;
                    this.resetForm();
                },

                // Limpiar formulario
                resetForm() {
                    this.form = {
                        sku: '',
                        name: '',
                        description: '',
                        price_cost: '',
                        price_sale: '',
                        stock: '',
                        stock_min: 5,
                        category: ''
                    };
                },

                // Guardar producto
                async saveProduct() {
                    this.loading = true;

                    try {
                        const response = await fetch('{{ route('products.store') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify(this.form)
                        });

                        const data = await response.json();

                        if (data.success) {
                            this.message = '✅ Producto creado exitosamente';
                            this.messageType = 'success';
                            this.closeModal();

                            // Recargar la página después de 1 segundo
                            setTimeout(() => {
                                window.location.reload();
                            }, 1000);
                        } else {
                            this.message = '❌ Error: ' + data.message;
                            this.messageType = 'error';
                        }
                    } catch (error) {
                        this.message = '❌ Error de conexión';
                        this.messageType = 'error';
                        console.error('Error:', error);
                    } finally {
                        this.loading = false;
                    }
                }
            }
        }
    </script>
@endsection
