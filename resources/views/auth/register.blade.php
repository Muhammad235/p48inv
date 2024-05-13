<x-guest-layout>
    <form method="POST" action="{{ route('register.store') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Username -->
        <div class="mt-4">
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Phone Number -->
        <div class="mt-4">
            <x-input-label for="phone_no" :value="__('Phone Number')" />
            <x-text-input id="phone_no" class="block mt-1 w-full" type="number" name="phone_no" :value="old('phone_no')" required autocomplete="phone_no" />
            <x-input-error :messages="$errors->get('phone_no')" class="mt-2" />
        </div>

        
        <!-- DOB -->
        <div class="mt-4">
            <x-input-label for="date_of_birth" :value="__('Date of birth')" />
            <x-text-input id="date_of_birth" class="block mt-1 w-full" type="date" name="date_of_birth" :value="old('date_of_birth')" required autocomplete="date" />
            <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
        </div>

        <!-- Bank Name -->
        <div class="mt-4">
            <x-input-label for="bank_name" :value="__('Bank Name')" />
            <x-text-input id="bank_name" class="block mt-1 w-full" type="text" name="bank_name" :value="old('bank_name')" required autocomplete="bank" />
            <x-input-error :messages="$errors->get('bank_name')" class="mt-2" />
        </div>

        <!-- Account Name -->
        <div class="mt-4">
            <x-input-label for="account_name" :value="__('Account Name')" />
            <x-text-input id="account_name" class="block mt-1 w-full" type="text" name="account_name" :value="old('account_name')" required autocomplete="name" />
            <x-input-error :messages="$errors->get('account_name')" class="mt-2" />
        </div>

        <!-- Account Number -->
        <div class="mt-4">
            <x-input-label for="account_number" :value="__('Account Number')" />
            <x-text-input id="account_number" class="block mt-1 w-full" type="text" name="account_number" :value="old('account_number')" required autocomplete="number" />
            <x-input-error :messages="$errors->get('account_number')" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="mt-4">
            <x-input-label for="address" :value="__('Address')" />
            <textarea name="address" id="address" cols="40" rows="5" class="block mt-1 w-full"></textarea>
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>
        

        <!-- Password -->
        {{-- <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div> --}}

        <!-- Confirm Password -->
        {{-- <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div> --}}

        <!-- Referral ID -->
        <div class="mt-4">
            <x-input-label for="referral_id" :value="__('Referral ID (Optional)')" />
            <x-text-input id="referral_id" class="block mt-1 w-full" type="text" name="referral_id" value="{{ old('referral_id', $referral_id) }}" />
            <x-input-error :messages="$errors->get('referral_id')" class="mt-2" />
        </div>

        <div class="flex items-center justify-center mt-5 mb-5">
            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>

        {{-- <div class="flex items-center justify-center mt-4">
            <a class="text-sm text-gray-600 hover:text-gray-900 mr-2 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
            <a href="{{ route('login') }}" class="text-sm underline text-gray-900 hover:text-gray-900">Login here</a>
        </div> --}}

    </form>
</x-guest-layout>