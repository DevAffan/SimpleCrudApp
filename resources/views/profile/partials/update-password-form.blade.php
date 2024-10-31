<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Current Password')" />
            <div class="relative">
                <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />

                <!-- Eye icon for toggling visibility -->
                <span id="toggle-current-password" class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer">
                    <i id="eye-icon-current" class="fas fa-eye text-gray-500"></i>
                </span>
            </div>
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>


        <div>
            <x-input-label for="update_password_password" :value="__('New Password')" />
            <div class="relative">
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />

                <!-- Eye icon for toggling visibility -->
                <span id="toggle-new-password" class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer">
                    <i id="eye-icon-new" class="fas fa-eye text-gray-500"></i>
                </span>
            </div>
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
            <div class="relative">
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />

                <!-- Eye icon for toggling visibility -->
                <span id="toggle-confirm-password" class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer">
                    <i id="eye-icon-confirm" class="fas fa-eye text-gray-500"></i>
                </span>
            </div>
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
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
