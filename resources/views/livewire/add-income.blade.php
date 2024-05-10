<div>
    <!-- resources/views/livewire/add-income.blade.php -->

    <form wire:submit.prevent="submit">
        <div class="bg-white p-4 rounded-lg">
            <div class="relative bg-inherit">
                <input type="text" id="amount" wire:model="amount" placeholder="Amount"
                    class="peer bg-transparent h-10 w-72 rounded-lg text-gray-200 placeholder-transparent ring-2 px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-blue-600" />
                <label for="amount"
                    class="absolute cursor-text left-0 -top-3 text-sm text-gray-500 bg-inherit mx-1 px-1 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-placeholder-shown:top-2 peer-focus:-top-3 peer-focus:text-sky-600 peer-focus:text-sm transition-all">Amount:</label>
            </div>
            @error('amount')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="bg-white p-4 rounded-lg">
            <div class="relative bg-inherit">
                <input type="text" id="description" wire:model="description" placeholder="Description"
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
                <input type="date" id="date" wire:model="date"
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
                <select id="recurring_period" wire:model="recurringPeriod"
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
                <label>Select Income Category:</label>
                @foreach ($categories as $category)
                    <div>
                        <input type="radio" id="{{ $category->id }}" name="income_category_id"
                            value="{{ $category->id }}" wire:model="income_category_id" />
                        <label for="{{ $category->id }}"
                            class="cursor-pointer">{{ $category->type }} : {{$category->description}}</label>
                    </div>
                @endforeach
            </div>
            @error('income_category_id')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="bg-white p-4 rounded-lg">
            <div class="relative bg-inherit">
                <input type="file" id="photo" wire:model="photo"
                    class="peer bg-transparent h-10 w-72 rounded-lg text-gray-200 placeholder-transparent ring-2 px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-blue-600" />
                <label for="photo"
                    class="absolute cursor-text left-0 -top-3 text-sm text-gray-500 bg-inherit mx-1 px-1 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-placeholder-shown:top-2 peer-focus:-top-3 peer-focus:text-sky-600 peer-focus:text-sm transition-all">Photo:</label>
            </div>
            @error('photo')
                <span class="text-red-500">{{ $message }}</span>
            @enderror

            @if ($photo)
                <img src="{{ $photo->temporaryUrl() }}" alt="Preview" class="mt-4 rounded-lg">
            @endif
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Submit</button>
    </form>

</div>
