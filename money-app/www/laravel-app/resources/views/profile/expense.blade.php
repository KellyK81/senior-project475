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
                <x-label for="income_soource" :value="__('Income Source')" />
                <x-input id="expense_type" class="block mt-1 w-full" type="text" name="expense_type" :value="old('expense_type')" required autofocus />
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