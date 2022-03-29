<x-app-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="{{asset('/images/dollar.png')}}" alt="Dollar Symbol" width="100" height="100">
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('income') }}">
            @csrf

            <!-- Income Source -->
            <div>
                <x-label for="income_soource" :value="__('Income Source')" />
                <select id="income_soource" name="income_soource" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" required autofocus>
                    <option value="employment">Employment Income (W2)</option>
                    <option value="contract">Contract Income</option>
                    <option value="business">Business Income</option>
                    <option value="interest">Interest Income</option>
                    <option value="divident">Dividend Income</option>
                    <option value="rental">Rental Income</option>
                    <option value="capital_gains">Investment Income/Capital Gains</option>
                    <option value="royalities">Royalties/licensing Income</option>
                </select>
            </div>

            <!-- Monthly Income -->
            <div class="mt-4">
                <x-label for="monthly_income" :value="__('Monthly Gross Income')" />
                <x-input id="monthly_income" class="block mt-1 w-full" type="number" name="monthly_income" :value="old('monthly_income')"
                placeholder="$5000.00" step="1.0" min="0" max="999999999" required />
            </div>


            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('expense') }}">
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