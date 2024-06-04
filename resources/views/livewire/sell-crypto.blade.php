<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
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

    <div class="mx-5 pl-[100px]">
        <h3 class="font-bold text-2xl text-white leading-tight text-center mt-4 mb-2 py-2">Venta Criptomonedas</h3>
        <form wire:submit.prevent="sell" id="sellForm">
            {{-- Formulario donde meter compra criptos (formato bien ) --}}
            <div class="p-4 rounded-lg max-w-sm">
                <div class="relative bg-inherit">
                    <select wire:model="currency" id="currency"
                        class="peer bg-transparent h-10 w-72 rounded-lg text-white placeholder-transparent ring-2 px-2 ring-gray-500 focus:ring-amarillo focus:outline-none focus:border-amarillo">
                        <option class="bg-oscuro" value="">Seleccione una moneda</option>
                        <option class="bg-oscuro" value="ADA"> Cardano (ADA) </option>
                        <option class="bg-oscuro" value="BNB"> Binance Coin (BNB) </option>
                        <option class="bg-oscuro" value="BTC"> Bitcoin (BTC) </option>
                        <option class="bg-oscuro" value="ETH"> Ethereum (ETH) </option>
                        <option class="bg-oscuro" value="SOL"> Solana (SOL) </option>
                    </select>
                    <label for="currency" 
                        class="absolute cursor-text left-0 -top-5 text-sm text-claro bg-inherit mx-1 px-1 peer-placeholder-shown:text-base peer-placeholder-shown:text-claro peer-placeholder-shown:top-2 peer-focus:-top-5 peer-focus:text-white peer-focus:text-sm transition-all">
                        Moneda:</label>
                </div>
                @error('currency')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="p-4 rounded-lg max-w-sm">
                <div class="relative bg-inherit ">
                    <input type="number" id="amount" wire:model="amount" placeholder="Cantidad"
                        class="peer bg-transparent h-10 w-72 rounded-lg text-gray-200 placeholder-transparent ring-2 px-2 ring-gray-500 focus:ring-amarillo focus:outline-none focus:border-amarillo" />
                    <label for="amount"
                        class="absolute cursor-text left-0 -top-5 text-sm text-claro bg-inherit mx-1 px-1 peer-placeholder-shown:text-base peer-placeholder-shown:text-claro peer-placeholder-shown:top-2 peer-focus:-top-5 peer-focus:text-white peer-focus:text-sm transition-all">Cantidad:</label>
                </div>
                @error('amount')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="p-4 rounded-lg max-w-sm">
                <div class="relative bg-inherit">
                    <input type="number" step="0.00000000000001" wire:model.lazy="price" id="price" placeholder="0.000000000"
                        class="peer bg-transparent h-10 w-72 rounded-lg text-gray-200 placeholder-transparent ring-2 px-2 ring-gray-500 focus:ring-amarillo focus:outline-none focus:border-amarillo" />
                    <label for="price"
                        class="absolute cursor-text left-0 -top-5 text-sm text-claro bg-inherit mx-1 px-1 peer-placeholder-shown:text-base peer-placeholder-shown:text-claro peer-placeholder-shown:top-2 peer-focus:-top-5 peer-focus:text-white peer-focus:text-sm transition-all">Precio por Unidad (€):</label>
                </div>
                @error('price')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="p-4 rounded-lg max-w-sm">
                <div class="relative bg-inherit">
                    <input type="text" id="total_earnings" readonly  placeholder="total_earnings"
                        class="peer bg-transparent h-10 w-72 rounded-lg text-gray-200 placeholder-transparent ring-2 px-2 ring-gray-500 focus:ring-amarillo focus:outline-none focus:border-amarillo" />
                    <label for="total_earnings"
                        class="absolute cursor-text left-0 -top-5 text-sm text-claro bg-inherit mx-1 px-1 peer-placeholder-shown:text-base peer-placeholder-shown:text-claro peer-placeholder-shown:top-2 peer-focus:-top-5 peer-focus:text-white peer-focus:text-sm transition-all">Total por venta (€):</label>
                </div>
                @error('total_earnings')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>                                   
            <div class="p-4 rounded-lg max-w-sm content-center text-center">
                <button type="button" id="maxAmount" class="bg-medio text-white hover:bg-amarillo hover:text-oscuro font-bold py-2 px-4 rounded"> Máxima cantidad  </button>
                <button type="submit" id="compra" class="bg-green-600 hover:bg-green-800 text-white font-bold py-2 px-4 rounded" > Vender</button>                
            </div>
        </form>
    </div>
</div>
