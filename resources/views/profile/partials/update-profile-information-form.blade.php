<section>
    <header>
        <h2 class="text-lg font-medium main-color" >
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form enctype="multipart/form-data" method="post" action="{{ route('profile.update') }}"  class="mt-6 space-y-6">
        @csrf
        @method('patch')


        <div class="mt-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Profile Image</label>
            <div class="mt-1 flex items-center">
                <!-- Image Preview Container -->
                <div class="h-12 w-12 rounded-full overflow-hidden">

                    @php
                        $avatar = 'avatar.png';
                        $dd = auth()->user()->image ?? $avatar;
                    @endphp
                    <img id="imagePreview" src="{{ asset('avatar_img/'. $dd) }}" alt="Preview" class="h-full w-full object-cover">
                </div>
                <!-- Upload Button -->
                <label for="image" class="cursor-pointer ml-2 bg-white rounded-md border border-gray-300 p-2 flex items-center justify-center text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    <span class="ml-2">Select Image</span>
                    <input id="image" name="image" type="file" class="sr-only" autofocus />
                </label>
            </div>
            @error('image')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username', $user->username)" required autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <x-input-label for="phone_no" :value="__('Phone Number')" />
            <x-text-input id="phone_no" class="block mt-1 w-full" type="text" name="phone_no" :value="old('phone_no', $user->phone_no)" required autocomplete="phone_no" />
            <x-input-error :messages="$errors->get('phone_no')" class="mt-2" />
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


{{-- @push('script') --}}
<script>
    // JavaScript for Image Preview
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('imagePreview');

    imageInput.addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                imagePreview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        } else {
            imagePreview.src = '#';
        }
    });
</script>
{{-- @endpush --}}