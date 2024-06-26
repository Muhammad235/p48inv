<section>
    <header>
        <h2 class="text-lg font-medium main-color" >
            {{ __('Bank Account Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your bank information and address.") }}
        </p>
    </header>


    <form enctype="multipart/form-data" method="post" action="{{ route('bank.details.create') }}"  class="mt-6 space-y-6">
        @csrf
        
        <div>
            <x-input-label for="account_number" :value="__('Account Number')" />
            <x-text-input id="account_number" name="account_number" type="number" class="mt-1 block w-full" :value="old('account_number', @$user->bank->account_number)" autofocus autocomplete="number" />
            <x-input-error class="mt-2" :messages="$errors->get('account_number')" />
        </div>

        <div>
            <x-input-label for="account_name" :value="__('Account Name')" />
            <x-text-input id="account_name" class="block mt-1 w-full" type="text" name="account_name" :value="old('account_name', @$user->bank->account_name)" autocomplete="name" />
            <x-input-error :messages="$errors->get('account_name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="bank_name" :value="__('Bank Name')" />
            <x-text-input id="bank_name" class="block mt-1 w-full" type="text" name="bank_name" :value="old('bank_name', @$user->bank->bank_name)" autocomplete="bank_name" />
            <x-input-error :messages="$errors->get('bank_name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address', @$user->bank->address)" autocomplete="address" />
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


