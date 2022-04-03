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
            
            <div><h2>Let's add your income!</h2></div>
            <!-- Success/Failure Alert -->
            @if (session('status'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{ session('status') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <!-- Income Source -->
            <div>
                <x-label for="income_source" :value="__('Income Source')" />
                <select id="income_source" name="income_source" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" required autofocus>
                    <option value="">Select Income Source</option>
                    <option value="employment">Employment Income (W2)</option>
                    <option value="contract">Contract Income (1099)</option>
                    <option value="business">Business Income</option>
                    <option value="interest">Interest Income</option>
                    <option value="dividend">Dividend Income</option>
                    <option value="rental">Rental Income</option>
                    <option value="capital_gains">Investment Income/Capital Gains</option>
                    <option value="royalities">Royalties/licensing Income</option>
                    <option value="other">Other Income</option>
                </select>
            </div>

            <!-- Monthly Income -->
            <div class="mt-4">
                <x-label for="monthly_income" :value="__('Monthly Gross Income')" />
                <x-input id="monthly_income" class="block mt-1 w-full" type="number" name="monthly_income" :value="old('monthly_income')"
                placeholder="$5000.00" step="1.0" min="0" max="999999999" required />
            </div>

            <input type="hidden" id="addmore" name="addmore" />

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('expense') }}">
                    {{ __('Skip, I will do it later.') }}
                </a>
                <button id="btnSaveAndAddMore" type="submit" class="ml-4 btn btn-sm btn-secondary">
                    {{ __('Save and Add More') }}
                </button>

                <x-button class="ml-4">
                    {{ __('Save and Continue') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-app-layout>