<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Punto de Venta - Pyme360</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        [x-cloak] {
            display: none !important;
        }

        .cart-item-transition {
            transition: all 0.3s ease;
        }

        /* Animación para notificaciones */
        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .toast-enter {
            animation: slideIn 0.3s ease-out forwards;
        }
    </style>
</head>

<body class="bg-gray-200 h-screen overflow-hidden" x-data="posApp()">

    <div class="bg-slate-800 text-white p-4 shadow-md flex justify-between items-center h-16 z-20 relative">
        <div class="flex items-center gap-4">
            <h1 class="text-xl font-bold tracking-wider flex items-center gap-2">
                🛒 Pyme360 <span class="text-blue-400 font-light">POS</span>
            </h1>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('dashboard') }}"
                class="bg-slate-700 hover:bg-slate-600 text-white px-4 py-2 rounded transition flex items-center gap-2 text-sm font-medium border border-slate-600">
                🏠 <span class="hidden md:inline">Dashboard</span>
            </a>
            <a href="{{ route('products.index') }}"
                class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-2 rounded transition flex items-center gap-2 text-sm font-medium shadow-sm">
                📦 <span class="hidden md:inline">Inventario</span>
            </a>
        </div>
    </div>

    <div class="flex h-[calc(100vh-64px)]">

        <div class="w-2/3 p-4 flex flex-col relative">
            <div class="mb-4 relative z-10">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input type="text" x-model="search" placeholder="Escanear código o buscar producto..."
                    class="w-full p-4 pl-12 rounded-xl shadow-sm border-2 border-gray-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 text-lg outline-none transition"
                    autofocus>
            </div>

            <div
                class="flex-1 overflow-y-auto grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 pb-4 content-start pr-2">
                <template x-for="product in filteredProducts" :key="product.id">
                    <div @click="addToCart(product)"
                        class="bg-white p-3 rounded-xl shadow-sm cursor-pointer hover:shadow-md hover:ring-2 hover:ring-blue-400 transition transform hover:-translate-y-1 border border-gray-200 h-36 flex flex-col justify-between relative group select-none active:scale-95">

                        <div class="absolute top-2 right-2 text-[10px] font-bold px-2 py-1 rounded-full shadow-sm"
                            :class="product.stock < 5 ? 'bg-red-100 text-red-700 border border-red-200' :
                                'bg-green-100 text-green-700 border border-green-200'">
                            Stock: <span x-text="product.stock"></span>
                        </div>

                        <div class="mt-4">
                            <span class="text-[10px] font-mono text-gray-400 uppercase bg-gray-100 px-1 rounded"
                                x-text="product.sku"></span>
                            <h3 class="font-bold text-gray-800 leading-tight text-sm mt-1 line-clamp-2"
                                x-text="product.name"></h3>
                        </div>
                        <div class="text-right">
                            <span class="text-blue-700 font-extrabold text-lg"
                                x-text="'$' + formatPrice(product.price_sale)"></span>
                        </div>
                    </div>
                </template>

                <div x-show="filteredProducts.length === 0"
                    class="col-span-full flex flex-col items-center justify-center text-gray-400 mt-20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mb-4 text-gray-300" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="text-lg">No se encontraron productos.</p>
                </div>
            </div>
        </div>

        <div class="w-1/3 bg-white shadow-2xl flex flex-col h-full border-l border-gray-300 z-10 relative">
            <div class="p-5 bg-gray-50 border-b flex justify-between items-center shadow-sm">
                <div>
                    <h2 class="font-extrabold text-gray-800 text-xl flex items-center gap-2">
                        📄 Ticket Actual
                    </h2>
                    <p class="text-xs text-gray-500 mt-1">Folio #PROV-{{ rand(1000, 9999) }}</p>
                </div>
                <div class="text-xs bg-white border border-gray-200 px-3 py-1 rounded-full text-gray-600 font-mono shadow-sm"
                    x-text="new Date().toLocaleDateString()"></div>
            </div>

            <div class="flex-1 overflow-y-auto p-4 space-y-3 bg-slate-50/30">
                <template x-for="(item, index) in cart" :key="index">
                    <div
                        class="bg-white p-3 rounded-xl shadow-sm border border-gray-200 flex flex-col gap-2 group hover:border-blue-300 transition cart-item-transition">

                        <div class="flex justify-between items-start">
                            <div class="flex-1 pr-2">
                                <div class="font-bold text-gray-800 text-sm leading-tight" x-text="item.name"></div>
                                <div class="text-[11px] text-gray-500 mt-1">
                                    <span x-text="'Unit: $' + formatPrice(item.price)"></span>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="font-extrabold text-gray-800 text-base"
                                    x-text="'$' + formatPrice(item.price * item.qty)"></div>
                            </div>
                        </div>

                        <div class="flex justify-between items-center mt-1 border-t border-gray-100 pt-2">
                            <div class="flex items-center bg-gray-100 rounded-lg shadow-inner">
                                <button @click="decreaseQty(index)"
                                    class="w-8 h-8 flex items-center justify-center text-gray-500 hover:bg-white hover:text-red-600 hover:shadow rounded-l-lg transition font-bold text-lg active:scale-95">-</button>

                                <div class="w-10 text-center font-bold text-sm text-gray-800 bg-white h-6 flex items-center justify-center mx-0.5 rounded-sm shadow-sm"
                                    x-text="item.qty"></div>

                                <button @click="increaseQty(index)"
                                    class="w-8 h-8 flex items-center justify-center text-gray-500 hover:bg-white hover:text-green-600 hover:shadow rounded-r-lg transition font-bold text-lg active:scale-95">+</button>
                            </div>

                            <button @click="removeFromCart(index)"
                                class="text-gray-300 hover:text-red-500 transition p-1 hover:bg-red-50 rounded"
                                title="Eliminar">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </template>

                <div x-show="cart.length === 0"
                    class="flex flex-col items-center justify-center h-full text-gray-400 opacity-60">
                    <div class="bg-gray-100 p-6 rounded-full mb-4">
                        <span class="text-5xl">🛒</span>
                    </div>
                    <p class="font-medium">El carrito está vacío</p>
                    <p class="text-xs">Selecciona productos a la izquierda</p>
                </div>
            </div>

            <div class="p-6 bg-white border-t border-gray-200 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.1)] z-20">
                <div class="flex justify-between items-end mb-4">
                    <span class="text-gray-500 text-xs font-bold uppercase tracking-widest">Total a Pagar</span>
                    <span class="text-4xl font-black text-slate-800 tracking-tight"
                        x-text="'$' + formatPrice(total)"></span>
                </div>

                <button @click="openModal()"
                    class="w-full bg-gradient-to-r from-green-600 to-green-500 hover:from-green-700 hover:to-green-600 text-white font-bold py-4 rounded-xl shadow-lg shadow-green-200 text-xl transition transform active:scale-95 flex justify-center items-center gap-3 disabled:opacity-50 disabled:cursor-not-allowed disabled:shadow-none"
                    :disabled="cart.length === 0" :class="{ 'grayscale': cart.length === 0 }">
                    <span class="text-2xl">✅</span>
                    <span>CONFIRMAR VENTA</span>
                </button>
            </div>
        </div>
    </div>

    <div class="fixed top-20 right-5 z-50 flex flex-col gap-2 pointer-events-none">
        <template x-for="notif in notifications" :key="notif.id">
            <div x-show="notif.show" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-x-full"
                x-transition:enter-end="opacity-100 translate-x-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-x-0"
                x-transition:leave-end="opacity-0 translate-x-full"
                class="pointer-events-auto flex items-center w-full max-w-xs p-4 space-x-3 text-gray-500 bg-white rounded-lg shadow-lg border-l-4"
                :class="{
                    'border-green-500': notif.type === 'success',
                    'border-red-500': notif.type === 'error',
                    'border-yellow-500': notif.type === 'warning'
                }">

                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 rounded-lg"
                    :class="{
                        'text-green-500 bg-green-100': notif.type === 'success',
                        'text-red-500 bg-red-100': notif.type === 'error',
                        'text-yellow-500 bg-yellow-100': notif.type === 'warning'
                    }">
                    <span x-show="notif.type === 'success'">✔</span>
                    <span x-show="notif.type === 'error'">✕</span>
                    <span x-show="notif.type === 'warning'">⚠️</span>
                </div>
                <div class="pl-2 text-sm font-semibold text-gray-800" x-text="notif.message"></div>
            </div>
        </template>
    </div>

    <div x-show="showModal" x-cloak
        class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/70 backdrop-blur-sm transition-opacity"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

        <div class="bg-white rounded-3xl shadow-2xl w-full max-w-md transform transition-all scale-100 p-8 border border-gray-100"
            @click.away="!isLoading ? showModal = false : null">

            <div class="text-center mb-8">
                <div
                    class="mx-auto flex items-center justify-center h-20 w-20 rounded-full bg-green-50 border-4 border-green-100 mb-6 animate-bounce">
                    <span class="text-4xl">💰</span>
                </div>
                <h3 class="text-2xl font-black text-gray-800 mb-2">¿Confirmar Pago?</h3>
                <p class="text-gray-500 text-sm">Se registrará la venta y se descontará el stock.</p>

                <div class="mt-6 p-4 bg-gray-50 rounded-xl border border-gray-200">
                    <p class="text-xs text-gray-500 uppercase font-bold tracking-wider mb-1">Monto Total</p>
                    <div class="text-4xl font-black text-slate-800" x-text="'$' + formatPrice(total)"></div>
                </div>
            </div>

            <div class="flex gap-3">
                <button @click="showModal = false" :disabled="isLoading"
                    class="w-1/2 bg-white text-gray-700 hover:bg-red-50 hover:text-red-600 hover:border-red-200 font-bold py-3.5 px-4 rounded-xl transition duration-200 border-2 border-gray-200 focus:outline-none focus:ring-4 focus:ring-red-100">
                    Cancelar
                </button>

                <button @click="processSale()"
                    class="w-1/2 bg-green-600 text-white hover:bg-green-700 font-bold py-3.5 px-4 rounded-xl shadow-lg transition duration-200 flex justify-center items-center gap-2 focus:outline-none focus:ring-4 focus:ring-green-200 disabled:opacity-70 disabled:cursor-wait"
                    :disabled="isLoading">
                    <span x-show="!isLoading">✔ Aceptar</span>
                    <svg x-show="isLoading" class="animate-spin h-5 w-5 text-white"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <script>
        function posApp() {
            return {
                search: '',
                products: @json($products),
                cart: [],
                isLoading: false,
                showModal: false,
                notifications: [], // Lista de notificaciones

                // --- SISTEMA DE NOTIFICACIONES ---
                notify(message, type = 'success') {
                    const id = Date.now();
                    this.notifications.push({
                        id,
                        message,
                        type,
                        show: true
                    });

                    // Auto-ocultar después de 3 segundos
                    setTimeout(() => {
                        const index = this.notifications.findIndex(n => n.id === id);
                        if (index !== -1) this.notifications.splice(index, 1);
                    }, 3000);
                },
                // ---------------------------------

                get filteredProducts() {
                    if (this.search === '') return this.products;
                    return this.products.filter(p => {
                        const term = this.search.toLowerCase();
                        return p.name.toLowerCase().includes(term) ||
                            p.sku.toLowerCase().includes(term);
                    });
                },

                get total() {
                    return this.cart.reduce((sum, item) => sum + (item.price * item.qty), 0);
                },

                addToCart(product) {
                    let existingItem = this.cart.find(item => item.id === product.id);

                    if (existingItem) {
                        if (existingItem.qty < product.stock) {
                            existingItem.qty++;
                            // Feedback sutil al aumentar
                        } else {
                            this.notify('⚠️ Stock máximo alcanzado (' + product.stock + ')', 'warning');
                        }
                    } else {
                        if (product.stock <= 0) {
                            this.notify('❌ Producto sin stock disponible', 'error');
                            return;
                        }
                        this.cart.push({
                            id: product.id,
                            name: product.name,
                            price: product.price_sale,
                            qty: 1,
                            stock: product.stock
                        });
                    }
                    this.search = '';
                },

                increaseQty(index) {
                    let item = this.cart[index];
                    if (item.qty < item.stock) {
                        item.qty++;
                    } else {
                        this.notify('⚠️ No hay más stock disponible', 'warning');
                    }
                },

                decreaseQty(index) {
                    let item = this.cart[index];
                    if (item.qty > 1) {
                        item.qty--;
                    }
                },

                removeFromCart(index) {
                    this.cart.splice(index, 1);
                },

                formatPrice(value) {
                    return new Intl.NumberFormat('es-CL').format(value);
                },

                openModal() {
                    if (this.cart.length > 0) {
                        this.showModal = true;
                    } else {
                        this.notify('El carrito está vacío', 'error');
                    }
                },

                processSale() {
                    this.isLoading = true;

                    fetch("{{ route('sales.store') }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            },
                            body: JSON.stringify({
                                cart: this.cart
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                this.showModal = false;
                                this.notify('✅ ¡Venta registrada exitosamente!', 'success');

                                setTimeout(() => {
                                    window.location.reload();
                                }, 1500); // Esperar un poco para que lea el mensaje
                            } else {
                                this.notify('❌ Error: ' + data.message, 'error');
                                this.showModal = false;
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            this.notify('Error de conexión', 'error');
                            this.showModal = false;
                        })
                        .finally(() => {
                            this.isLoading = false;
                        });
                }
            }
        }
    </script>
</body>

</html>
