<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="{{asset('/images/dollar.png')}}" alt="Dollar Symbol" width="100" height="100">
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('profile') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="job_title" :value="__('Job Title')" />
                <x-input id="job_title" class="block mt-1 w-full" type="text" name="job_title" value="{{ $user_profile['job_title'] ?? '' }}" required autofocus />
            </div>

            <!-- Job Skills -->
            <div class="mt-4">
                <x-label for="job_skills" :value="__('Job Skills')" />
                <x-input id="job_skills" class="block mt-1 w-full" type="text" name="job_skills" value="{{ $user_profile['job_skills'] ?? '' }}" placeholder="Communication, Interpersonal, C++, Java" required />
            </div>

            <!-- Job Location Preference -->
            <div class="mt-4">
                <x-label for="job_location_preference" :value="__('Job Location Preferences - City')" />
                <x-input id="job_location_preference" class="block mt-1 w-full" type="text" name="job_location_preference" value="{{ $user_profile['job_location_preference'] ?? '' }}" placeholder="Frederick, Rockville, Bethesda" required />
            </div>

            <!-- Years of Experience -->
            <div class="mt-4">
                <x-label for="years_of_experience" :value="__('Years of Experience')" />
                <x-input id="years_of_experience" class="block mt-1 w-full" type="number" name="years_of_experience" value="{{ $user_profile['years_of_experience'] ?? '' }}"
                placeholder="6.0" step="0.01" min="0" max="70" required />
            </div>

            <!-- Expected Retirement Age -->
            <div class="mt-4">
                <x-label for="expected_retirement_age" :value="__('Expected Retirement Age')" />
                <x-input id="expected_retirement_age" class="block mt-1 w-full" type="number" name="expected_retirement_age" value="{{ $user_profile['expected_retirement_age'] ?? '' }}"
                placeholder="65" min="30" max="90" required />
            </div>

            <!-- Expected Retirement Income -->
            <div class="mt-4">
                <x-label for="expected_retirement_income" :value="__('Expected Retirement Income (Monthly)')" />
                <x-input id="expected_retirement_income" class="block mt-1 w-full" type="number" name="expected_retirement_income" value="{{ $user_profile['expected_retirement_income'] ?? '' }}"
                    placeholder="$2,500.0" step="1" min="0" max="999999" required />
            </div>

            <!-- Current Savings (Total) -->
            <div class="mt-4">
                <x-label for="current_savings" :value="__('Current Savings (Total)')" />
                <x-input id="current_savings" class="block mt-1 w-full" type="number" name="current_savings" value="{{ $user_profile['current_savings'] ?? '' }}"
                    placeholder="$10,000.0" step="1" min="0" max="999999" required />
            </div>

             <!-- Currenty City -->
             <div class="mt-4">
                <x-label for="city" :value="__('City')" />
                <x-input id="city" class="block mt-1 w-full" type="text" name="city" value="{{ $user_profile['city'] ?? '' }}" required />
            </div>

             <!-- Currenty State -->
             <div class="mt-4">
                <x-label for="state" :value="__('State')" />
                <x-input id="state" class="block mt-1 w-full" type="text" name="state" value="{{ $user_profile['state'] ?? '' }}" required />
            </div>

             <!-- Current Country -->
             <div class="mt-4">
                <x-label for="country" :value="__('Country')" />
                @include('components.countries')
            </div>

             <!-- Postal Code -->
             <div class="mt-4">
                <x-label for="zipcode" :value="__('Zipcode')" />
                <x-input id="zipcode" class="block mt-1 w-full" type="text" name="zipcode" value="{{ $user_profile['zipcode'] ?? '' }}" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('income') }}">
                    {{ __('Skip, I will do it later.') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Save and Continue') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
