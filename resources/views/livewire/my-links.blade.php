<div>
    <x-modal :title="__('components.my-links.title')">
        <x-slot:toggler>
            <button class="btn btn-ghost bg-base-300">
                @lang('components.my-links.title')
                <span class="badge">
                    {{$count}}
                </span>
            </button>
        </x-slot:toggler>
        @foreach($links as $link)
            <livewire:link-item wire:key="{{$link->id}}" :$link/>
        @endforeach
    </x-modal>
</div>
