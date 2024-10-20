<div>
    <form wire:submit.prevent="submit" class="flex flex-col gap-2">
        <x-text-input wire:model.blur="username" :placeholder="__('validation.attributes.username')">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
            </svg>
        </x-text-input>
        <x-text-input wire:model.blur="password" type="password" :placeholder="__('validation.attributes.password')">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
            </svg>
        </x-text-input>
        <div class="my-2">
            <x-checkbox wire:model="remember">
                @lang('validation.attributes.remember')
            </x-checkbox>
        </div>
        <x-submit>
            <x-loading size="lg" wire:target="submit">
                @lang('forms.login.submit')
            </x-loading>
        </x-submit>
        <span class="mt-3 text-center text-sm text-blue-500 hover:text-blue-700 transition-colors">
            <x-link :href="route('register')">
                @lang('pages.login.dont-have-account')
            </x-link>
        </span>
    </form>
</div>
