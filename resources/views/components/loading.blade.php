<div>
    <span wire:loading {{$attributes->only('wire:target')}} class="loading loading-spinner loading-{{$size ?? 'sm'}}"></span>
    <span wire:loading.remove {{$attributes->only('wire:target')}}>{{$slot}}</span>
</div>
