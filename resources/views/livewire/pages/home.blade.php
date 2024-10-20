<div class="space-y-10 text-center">
    <h1 class="text-5xl">@lang('pages.home.header')</h1>
    <div class="card bg-base-300">
        <div class="card-body">
            @guest
                <div class="flex flex-col gap-5">
                    <div class="flex flex-row gap-5 justify-center items-center">
                        <x-link :href="route('login')" class="btn btn-ghost bg-base-100 px-6">
                            @lang('navigation.login')
                        </x-link>
                        <x-link :href="route('register')" class="btn btn-ghost bg-base-100">
                            @lang('navigation.register')
                        </x-link>
                    </div>
                    <p class="text-sm text">* @lang('pages.home.auth-description')</p>
                </div>
            @endguest
            @auth
                @if(!$link)
                        <form class="flex gap-2 max-sm:flex-col" wire:submit.prevent="create">
                            <x-text-input wire:model.blur="url" :placeholder="__('forms.links.create.placeholder')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                                </svg>
                            </x-text-input>
                            <x-submit>
                                <x-loading wire:target="create">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                    </svg>
                                </x-loading>
                            </x-submit>
                        </form>
                    @else
                    <div class="flex gap-2 items-center">
                        <div class="bg-base-100 rounded-lg px-5 py-4">
                            {{$link}}
                        </div>
                        <x-clipboard :value="$link"/>
                    </div>
                @endif
            @endauth
        </div>
    </div>
    @auth
        <livewire:my-links/>
    @endauth
</div>
