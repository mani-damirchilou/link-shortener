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
            </div>
        </div>
</div>
