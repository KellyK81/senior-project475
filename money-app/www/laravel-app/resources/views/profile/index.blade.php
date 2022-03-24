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

                <x-input id="job_title" class="block mt-1 w-full" type="text" name="job_title" :value="old('job_title')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="job_skills" :value="__('Job Skills')" />
                <x-input id="job_skills" class="block mt-1 w-full" type="text" name="job_skills" :value="old('job_skills')" required />
            </div>

            <!-- Job Location Preference -->
            <div class="mt-4">
                <x-label for="job_location_preferences" :value="__('Job Location Preferences')" />
                <x-input id="job_location_preferences" class="block mt-1 w-full" type="text" name="job_location_preferences" :value="old('job_location_preferences')" required />
            </div>


             <!-- Currenty City -->
             <div class="mt-4">
                <x-label for="city" :value="__('Current City')" />
                <x-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required />
            </div>

             <!-- Currenty State -->
             <div class="mt-4">
                <x-label for="state" :value="__('Current State')" />
                <x-input id="state" class="block mt-1 w-full" type="text" name="state" :value="old('state')" required />
            </div>

             <!-- Current Country -->
             <div class="mt-4">
                <x-label for="country" :value="__('Country')" />
                @include('components.countries')
            </div>

             <!-- Postal Code -->
             <div class="mt-4">
                <x-label for="zipcode" :value="__('Zipcode')" />
                <x-input id="zipcode" class="block mt-1 w-full" type="text" name="zipcode" :value="old('zipcode')" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('profile') }}">
                    {{ __('Skip, I will do it later.') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Save and Continue') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
