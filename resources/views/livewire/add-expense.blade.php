<div>
    <div>
        <h2> Añadir nuevo gasto </h2>

        <form wire:submit.prevent="submit">
            <div class="bg-white p-4 rounded-lg">
                <div class="relative bg-inherit">
                    <input type="text" id="amount" name="amount" wire:model="amount" placeholder="Amount (€)"
                        class="peer bg-transparent h-10 w-72 rounded-lg text-gray-200 placeholder-transparent ring-2 px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-blue-600" />
                    <label for="amount"
                        class="absolute cursor-text left-0 -top-3 text-sm text-gray-500 bg-inherit mx-1 px-1 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-placeholder-shown:top-2 peer-focus:-top-3 peer-focus:text-sky-600 peer-focus:text-sm transition-all">Amount
                        (€):
                    </label>
                </div>
                @error('amount')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>


            <div class="bg-white p-4 rounded-lg">
                <div class="relative bg-inherit">
                    <input type="text" id="description" name="description" wire:model="description"
                        placeholder="Description"
                        class="peer bg-transparent h-10 w-72 rounded-lg text-gray-200 placeholder-transparent ring-2 px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-blue-600" />
                    <label for="description"
                        class="absolute cursor-text left-0 -top-3 text-sm text-gray-500 bg-inherit mx-1 px-1 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-placeholder-shown:top-2 peer-focus:-top-3 peer-focus:text-sky-600 peer-focus:text-sm transition-all">Description:</label>
                </div>
                @error('description')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="bg-white p-4 rounded-lg">
                <div class="relative bg-inherit">
                    <input type="date" id="date" name="date" wire:model="date"
                        class="peer bg-transparent h-10 w-72 rounded-lg text-gray-200 placeholder-transparent ring-2 px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-blue-600" />
                    <label for="date"
                        class="absolute cursor-text left-0 -top-3 text-sm text-gray-500 bg-inherit mx-1 px-1 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-placeholder-shown:top-2 peer-focus:-top-3 peer-focus:text-sky-600 peer-focus:text-sm transition-all">Date:</label>
                </div>
                @error('date')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="bg-white p-4 rounded-lg">
                <div class="relative bg-inherit">
                    <select id="recurring_period" name="recurring_period" wire:model="recurringPeriod"
                        class="peer bg-transparent h-10 w-72 rounded-lg text-gray-200 placeholder-transparent ring-2 px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-blue-600">
                        <option value="none">None</option>
                        <option value="daily">Daily</option>
                        <option value="weekly">Weekly</option>
                        <option value="biweekly">Biweekly</option>
                        <option value="monthly">Monthly</option>
                        <option value="bimonthly">Bimonthly</option>
                        <option value="quarterly">Quarterly</option>
                        <option value="semiannually">Semiannually</option>
                        <option value="annually">Annually</option>
                    </select>
                    <label for="recurring_period"
                        class="absolute cursor-text left-0 -top-3 text-sm text-gray-500 bg-inherit mx-1 px-1 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-placeholder-shown:top-2 peer-focus:-top-3 peer-focus:text-sky-600 peer-focus:text-sm transition-all">Recurring
                        Period:</label>
                </div>
                @error('recurringPeriod')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="bg-white p-4 rounded-lg">
                <div class="relative bg-inherit">
                    <select id="expense_category_id" name="expense_category_id" wire:model="expense_category_id"
                        class=" peer bg-transparent h-10 w-72 rounded-lg text-gray-200 placeholder-transparent ring-2 px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-blue-600">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->type }} : {{ $category->description }}
                            </option>
                        @endforeach
                    </select>
                    <label for="expense_category_id" class="absolute cursor-text left-0 -top-3 text-sm text-gray-500 bg-inherit mx-1 px-1 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-placeholder-shown:top-2 peer-focus:-top-3 peer-focus:text-sky-600 peer-focus:text-sm transition-all">Select Expense Category:</label>
                </div>
                @error('expense_category_id')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>


            <div class="bg-white p-4 rounded-lg">
                <div class="relative bg-inherit">
                    <input type="file" id="photo" name="photo" wire:model="photo"
                        class="peer bg-transparent h-10 w-72 rounded-lg text-gray-200 placeholder-transparent ring-2 px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-blue-600" />
                    <label for="photo"
                        class="absolute cursor-text left-0 -top-3 text-sm text-gray-500 bg-inherit mx-1 px-1 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-placeholder-shown:top-2 peer-focus:-top-3 peer-focus:text-sky-600 peer-focus:text-sm transition-all">Photo:</label>
                </div>
                @error('photo')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror

                @if ($photo)
                    <img src="{{ $photo->temporaryUrl() }}" alt="Photo Preview"
                        class="mt-4 rounded-lg max-h-[200px] max-w-[200px]">
                @endif
            </div>


            <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold m-3 py-2 px-4 rounded" type="submit">Submit</button>
        </form>

    </div>

</div>


{{-- 
    <div class="bg-white p-4 rounded-lg">
        <div class="relative bg-inherit">
            <input type="text" id="username" name="username" class="peer bg-transparent h-10 w-72 rounded-lg text-gray-200 placeholder-transparent ring-2 px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-blue-600" placeholder="Type inside me"/>
            <label for="username" class="absolute cursor-text left-0 -top-3 text-sm text-gray-500 bg-inherit mx-1 px-1 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-placeholder-shown:top-2 peer-focus:-top-3 peer-focus:text-sky-600 peer-focus:text-sm transition-all">Type inside me</label>
        </div>
    </div> 

--}}
