<x-app-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="{{asset('/images/dollar.png')}}" alt="Dollar Symbol" width="100" height="100">
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('expense') }}">
            @csrf

            <!-- Expense Type -->
            <div>
                <x-label for="expense_type" :value="__('Expense Type - Monthly')" />
                <select id="expense_type" name="expense_type" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" required autofocus>
                    <option value="">Select Expense Type</option>
                    <option value="mortgage">Mortgage Payment</option>
                    <option value="personal_loan">Personal Loan Payment</option>
                    <option value="car_loan">Car Loan Payment</option>
                    <option value="rental">Rental Payment</option>
                    <option value="groceries">Groceries</option>
                    <option value="utilities">Utilities</option>
                    <option value="other">Other Expense</option>
                </select>
            </div>

            <!-- Monthly Expense Amount -->
            <div class="mt-4">
                <x-label for="monthly_expense_amount" :value="__('Monthly Expense Amount')" />
                <x-input id="monthly_expense_amount" class="block mt-1 w-full" type="number" name="monthly_expense_amount" :value="old('monthly_expense_amount')"
                placeholder="$2000.00" step="1.0" min="0" max="999999999" required />
            </div>


            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('dashboard') }}">
                    {{ __('Skip, I will do it later.') }}
                </a>
                <button type="submit" class="ml-4 btn btn-sm btn-secondary">
                    {{ __('Save and Add More') }}
                </button>

                <x-button class="ml-4">
                    {{ __('Save and Continue') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-app-layout>