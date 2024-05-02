<section>
    <header>
        <h2 class="text-lg font-medium main-color" >
            {{ __('Bank Account Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your bank information and address.") }}
        </p>
    </header>


    <form enctype="multipart/form-data" method="post" action="{{ route('profile.update') }}"  class="mt-6 space-y-6">
        @csrf
        @method('patch')
        
        <div>
            <x-input-label for="name" :value="__('Account Number')" />
            <x-text-input id="name" name="account_number" type="text" class="mt-1 block w-full" :value="old('name', @$user->account_number)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="account_name" :value="__('Account Name')" />
            <x-text-input id="account_name" class="block mt-1 w-full" type="text" name="account_name" :value="old('account_name', @$user->account_name)" required autocomplete="account_name" />
            <x-input-error :messages="$errors->get('account_name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="bank_name" :value="__('Bank Name')" />
            <x-text-input id="bank_name" class="block mt-1 w-full" type="text" name="bank_name" :value="old('bank_name', @$user->bank_name)" required autocomplete="bank_name" />
            <x-input-error :messages="$errors->get('bank_name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address', @$user->address)" required autocomplete="address" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>


