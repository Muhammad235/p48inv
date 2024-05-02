<x-profile-layout>
    <x-slot name="header">

        <style>
            .profile-avatar{
               width: 50px; 
               height: 50px;
               border-radius: 50%;
            }
        </style>

        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Profile') }}
            </h2>
        
            @if (auth()->user()->image == null)
            <a href="{{ route('profile.edit') }}">
              <img alt="image" src="{{ asset('avatar_img/avatar.png') }}" class="rounded-full mr-1" width="40" height="40"> 
            </a>
            @else
            <a href="{{ route('profile.edit')  }}">
                <img alt="image" src="{{ asset('avatar_img/' . auth()->user()->image) }}" class="profile-avatar h-100">
            </a>
            @endif

        </div>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-account-information')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-profile-layout>
