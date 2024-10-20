<div>
    <a wire:navigate.hover {{$attributes->only('href')}} {{$attributes->only('class')}}>{{$slot}}</a>
</div>
