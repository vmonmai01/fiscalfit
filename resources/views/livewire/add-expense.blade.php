<div>
    <div>
        <form wire:submit.prevent="submit">
            <div>
                <label for="amount">Amount:</label>
                <input type="text" id="amount" wire:model="amount">
                @error('amount')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="description">Description:</label>
                <input type="text" id="description" wire:model="description">
                @error('description')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="date">Date:</label>
                <input type="date" id="date" wire:model="date">
                @error('date')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="recurring_period">Recurring Period:</label>
                <select id="recurring_period" wire:model="recurringPeriod">
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
                @error('recurringPeriod')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label>Select Expense Category:</label>
                @foreach ($categories as $category)
                    <div>
                        <input type="radio" id="{{ $category->id }}" name="expense_category_id"
                            value="{{ $category->id }}" wire:model="expense_category_id">
                        <label for="{{ $category->id }}">{{ $category->type }} : {{ $category->description }}</label>
                    </div>
                @endforeach
                @error('expense_category_id')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="photo">Photo:</label>
                <input type="file" id="photo" wire:model="photo">
                @error('photo')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <button type="submit">Submit</button>
        </form>

    </div>

</div>
