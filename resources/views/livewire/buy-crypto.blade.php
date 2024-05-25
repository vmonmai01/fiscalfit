<div>
    @if ($mensajeExito)
        <div id="infoSucces" class="fixed inset-0 flex items-center justify-center z-50  text-green-500">
            <div class="flex bg-green-200 max-w-sm mb-4">
                <div class="w-16 bg-green-400">
                    <div class="p-4">
                        <svg class="h-8 w-8 text-white fill-current" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512">
                            <path
                                d="M468.907 214.604c-11.423 0-20.682 9.26-20.682 20.682v20.831c-.031 54.338-21.221 105.412-59.666 143.812-38.417 38.372-89.467 59.5-143.761 59.5h-.12C132.506 459.365 41.3 368.056 41.364 255.883c.031-54.337 21.221-105.411 59.667-143.813 38.417-38.372 89.468-59.5 143.761-59.5h.12c28.672.016 56.49 5.942 82.68 17.611 10.436 4.65 22.659-.041 27.309-10.474 4.648-10.433-.04-22.659-10.474-27.309-31.516-14.043-64.989-21.173-99.492-21.192h-.144c-65.329 0-126.767 25.428-172.993 71.6C25.536 129.014.038 190.473 0 255.861c-.037 65.386 25.389 126.874 71.599 173.136 46.21 46.262 107.668 71.76 173.055 71.798h.144c65.329 0 126.767-25.427 172.993-71.6 46.262-46.209 71.76-107.668 71.798-173.066v-20.842c0-11.423-9.259-20.683-20.682-20.683z" />
                            <path
                                d="M505.942 39.803c-8.077-8.076-21.172-8.076-29.249 0L244.794 271.701l-52.609-52.609c-8.076-8.077-21.172-8.077-29.248 0-8.077 8.077-8.077 21.172 0 29.249l67.234 67.234a20.616 20.616 0 0 0 14.625 6.058 20.618 20.618 0 0 0 14.625-6.058L505.942 69.052c8.077-8.077 8.077-21.172 0-29.249z" />
                        </svg>
                    </div>
                </div>
                <div class="w-auto text-grey-darker items-center p-4">
                    <span class="text-lg font-bold pb-4">
                        Información
                    </span>
                    <p class="leading-tight">
                        {{ $mensajeExito }}
                    </p>
                </div>
            </div>

        </div>
    @endif

    @if ($mensajeError)
        <div id="infoError" class="fixed inset-0 flex items-center justify-center z-50 text-w">
            <div class="flex bg-red-400 max-w-md mb-4">
                <div class="w-16 bg-red-600">
                    <div class="p-4">
                        <svg class="h-8 w-8 text-white fill-current" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512">
                            <path
                                d="M437.019 74.981C388.667 26.629 324.38 0 256 0S123.333 26.63 74.981 74.981 0 187.62 0 256s26.629 132.667 74.981 181.019C123.332 485.371 187.62 512 256 512s132.667-26.629 181.019-74.981C485.371 388.667 512 324.38 512 256s-26.629-132.668-74.981-181.019zM256 470.636C137.65 470.636 41.364 374.35 41.364 256S137.65 41.364 256 41.364 470.636 137.65 470.636 256 374.35 470.636 256 470.636z"
                                fill="#FFF" />
                            <path
                                d="M341.22 170.781c-8.077-8.077-21.172-8.077-29.249 0L170.78 311.971c-8.077 8.077-8.077 21.172 0 29.249 4.038 4.039 9.332 6.058 14.625 6.058s10.587-2.019 14.625-6.058l141.19-141.191c8.076-8.076 8.076-21.171 0-29.248z"
                                fill="#FFF" />
                            <path
                                d="M341.22 311.971l-141.191-141.19c-8.076-8.077-21.172-8.077-29.248 0-8.077 8.076-8.077 21.171 0 29.248l141.19 141.191a20.616 20.616 0 0 0 14.625 6.058 20.618 20.618 0 0 0 14.625-6.058c8.075-8.077 8.075-21.172-.001-29.249z"
                                fill="#FFF" />
                        </svg>
                    </div>
                </div>
                <div class="w-auto text-red-darker items-center p-4">
                    <span class="text-lg font-bold pb-4">
                        Error
                    </span>
                    <p class="leading-tight">
                        {{ $mensajeError }}
                    </p>
                </div>
            </div>
        </div>
    @endif

    {{-- Formulario de compra de criptomonedas --}}

    <div class="mx-5 px-[100px]">
        <h2>Comprar Criptomonedas</h2>
        <form wire:submit.prevent="buy" id="buyForm">
            <div class="form-group">
                <label for="currency">Moneda:</label>
                <select wire:model="currency" id="currency" class="form-control">
                    <option value="">Seleccione una moneda</option>
                    <option value="ADA"> Cardano (ADA) </option>
                    <option value="BNB"> Binance Coin (BNB) </option>
                    <option value="BTC"> Bitcoin (BTC) </option>
                    <option value="ETH"> Ethereum (ETH) </option>
                    <option value="SOL"> Solana (SOL) </option>
                </select>

                @error('currency')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Precio por Unidad (€):</label>
                <input type="number" step="0.00000000000001" wire:model.lazy="price" id="price"
                    class="form-control">
                @error('price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="amount">Cantidad:</label>
                <input type="number" step="0.00000000000001" wire:model="amount" id="amount" class="form-control">
                @error('amount')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="total-cost">Costo Total (€):</label>
                <input type="text" id="total-cost" class="form-control" readonly>
            </div>

            <button type="submit" class="btn btn-primary">Comprar</button>
        </form>
    </div>

    <script>
        // Obtener referencias a los elementos del formulario
        const priceInput = document.getElementById('price');
        const amountInput = document.getElementById('amount');
        const totalCostInput = document.getElementById('total-cost');

        // Función para calcular el costo total y actualizar el campo correspondiente
        function calculateTotalCost() {
            const price = parseFloat(priceInput.value);
            const amount = parseFloat(amountInput.value);
            const totalCost = price * amount;
            // Mostrar el costo total en el campo correspondiente
            totalCostInput.value = isNaN(totalCost) ? '' : totalCost.toFixed(8);
        }

        // Event Listeners para calcular el costo total cuando cambien los valores de precio o cantidad
        priceInput.addEventListener('input', calculateTotalCost);
        amountInput.addEventListener('input', calculateTotalCost);

        // Función para actualizar el precio en el formulario según la moneda seleccionada
        function updatePrice() {
            // Obtener el valor seleccionado de la lista desplegable
            const currency = document.getElementById('currency').value;
            // Actualizar el precio en el formulario según la moneda seleccionada
            switch (currency) {
                case 'ADA':
                    document.getElementById('price').value = document.getElementById('price-ADA').innerText;
                    break;
                case 'BNB':
                    document.getElementById('price').value = document.getElementById('price-BNB').innerText;
                    break;
                case 'BTC':
                    document.getElementById('price').value = document.getElementById('price-BTC').innerText;
                    break;
                case 'ETH':
                    document.getElementById('price').value = document.getElementById('price-ETH').innerText;
                    break;
                case 'SOL':
                    document.getElementById('price').value = document.getElementById('price-SOL').innerText;
                    break;
                default:
                    document.getElementById('price').value = ''; // Limpiar el campo si no se selecciona ninguna moneda
                    break;
            }
            console.log('Llega a updatePrice');
            // Le damos foco al campo de precio para que livewire lo detecte!
            document.getElementById('price').focus();
        }

        // Event listener para detectar el cambio en la selección de moneda
        document.getElementById('currency').addEventListener('change', updatePrice);


        document.getElementById('buyForm').addEventListener('submit', function() {
            console.log('Enviando formulario de compra');
            // Ocultar mensaje de éxito después de 3 segundos si está presente
            @if ($mensajeExito)
                setTimeout(function() {
                    // @this.set('mensajeExito', null); // Eliminar la variable de mensaje de éxito
                    document.getElementById('infoSucces').style.display = 'none';
                }, 3000);
            @endif

            // Ocultar mensaje de error después de 3 segundos si está presente
            @if ($mensajeError)
                setTimeout(function() {
                    // @this.set('mensajeError', null); // Eliminar la variable de mensaje de error
                    document.getElementById('infoError').classList.add('hidden');
                }, 3000);
            @endif
        });
    </script>

</div>
