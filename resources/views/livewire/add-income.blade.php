<div>
    
    <!-- resources/views/livewire/add-income.blade.php -->
    <div class="p-4 rounded-lg max-w-sm">
        <h2 class="text-3xl text-claro font-bold"> Añadir nuevo ingreso </h2>
    </div>

    <form wire:submit.prevent="submit" class="bg-oscuro">
        <div class="p-4 rounded-lg max-w-sm">
            <div class="relative bg-inherit ">
                <input type="text" id="amount" wire:model="amount" placeholder="Amount"
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
                <input type="text" id="description" wire:model="description" placeholder="Description"
                    class="peer bg-transparent h-10 w-72 rounded-lg text-gray-200 placeholder-transparent ring-2 px-2 ring-gray-500 focus:ring-amarillo focus:outline-none focus:border-amarillo" />
                <label for="description"
                    class="absolute cursor-text left-0 -top-5 text-sm text-claro bg-inherit mx-1 px-1 peer-placeholder-shown:text-base peer-placeholder-shown:text-claro peer-placeholder-shown:top-2 peer-focus:-top-5 peer-focus:text-white peer-focus:text-sm transition-all">Descripción:</label>
            </div>
            @error('description')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="p-4 rounded-lg max-w-sm">
            <div class="relative bg-inherit">
                <input type="date" id="date" wire:model="date"
                    class="peer bg-transparent h-10 w-72 rounded-lg text-gray-200 placeholder-transparent ring-2 px-2 ring-gray-500 focus:ring-amarillo focus:outline-none focus:border-amarillo" />
                <label for="date"
                    class="absolute cursor-text left-0 -top-5 text-sm text-claro bg-inherit mx-1 px-1 peer-placeholder-shown:text-base peer-placeholder-shown:text-claro peer-placeholder-shown:top-2 peer-focus:-top-5 peer-focus:text-white peer-focus:text-sm transition-all">Fecha:</label>
            </div>
            @error('date')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="p-4 rounded-lg max-w-sm">
            <div class="relative bg-inherit">
                <select id="recurring_period" wire:model="recurringPeriod"
                    class="peer bg-transparent h-10 w-72 rounded-lg text-white placeholder-transparent ring-2 px-2 ring-gray-500 focus:ring-amarillo focus:outline-none focus:border-amarillo">
                    <option class="bg-oscuro" value="none">Ninguna</option>
                    <option class="bg-oscuro" value="daily">Diaria</option>
                    <option class="bg-oscuro" value="weekly">Semanal</option>
                    <option class="bg-oscuro" value="biweekly">Bisemanal</option>
                    <option class="bg-oscuro" value="monthly">Mensual</option>
                    <option class="bg-oscuro" value="bimonthly">Bimensual</option>
                    <option class="bg-oscuro" value="quarterly">Trimestral</option>
                    <option class="bg-oscuro" value="semiannually">Semianual</option>
                    <option class="bg-oscuro" value="annually">Anual</option>
                </select>
                <label for="recurring_period"
                    class="absolute cursor-text left-0 -top-5 text-sm text-claro bg-inherit mx-1 px-1 peer-placeholder-shown:text-base peer-placeholder-shown:text-claro peer-placeholder-shown:top-2 peer-focus:-top-5 peer-focus:text-white peer-focus:text-sm transition-all">
                    Periodicidad:</label>
            </div>
            @error('recurringPeriod')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="p-4 rounded-lg max-w-sm">
            <div class="relative bg-inherit">
                <select id="income_category_id" name="income_category_id" wire:model="income_category_id"
                    class="peer bg-transparent h-10 w-72 rounded-lg text-white placeholder-transparent ring-2 px-2 ring-gray-500 focus:ring-amarillo focus:outline-none focus:border-amarillo">
                    @foreach ($categories as $category)
                        <option class="bg-oscuro" value="{{ $category->id }}">{{ $category->type }} : {{ $category->description }}
                        </option>
                    @endforeach
                </select>
                <label for="income_category_id"
                    class="absolute cursor-text left-0 -top-5 text-sm text-claro bg-inherit mx-1 px-1 peer-placeholder-shown:text-base peer-placeholder-shown:text-claro peer-placeholder-shown:top-2 peer-focus:-top-5 peer-focus:text-white peer-focus:text-sm transition-all">
                    Categoría de ingreso:</label>
            </div>
            @error('income_category_id')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>


        <div class="p-4 rounded-lg max-w-sm">
            <div class="relative bg-inherit">
                <input type="file" id="photo" wire:model="photo"
                    class="peer bg-transparent h-10 w-72 rounded-lg text-gray-200 placeholder-transparent ring-2 px-2 ring-gray-500 focus:ring-amarillo focus:outline-none focus:border-amarillo" />
                <label for="photo"
                    class="absolute cursor-text left-0 -top-5 text-sm text-claro bg-inherit mx-1 px-1 peer-placeholder-shown:text-base peer-placeholder-shown:text-claro peer-placeholder-shown:top-2 peer-focus:-top-5 peer-focus:text-sky-600 peer-focus:text-sm transition-all">Imagen:</label>
            </div>
            @error('photo')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
            
            @if ($photo)
            <div class="align-center bg-oscuro pl-10">
                <img src="{{ $photo->temporaryUrl() }}" alt="Preview" class="mt-4 rounded-lg  max-h-[200px] max-w-[200px] object-contain ">
            </div>
            @endif
        </div>

        <button class="bg-amarillo hover:amarillo hover:border-black text-oscuro font-bold m-3 py-2 px-4 rounded" type="submit"> Añadir Ingreso</button>
    </form>
    
</div>
