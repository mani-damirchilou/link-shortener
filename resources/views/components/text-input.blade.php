<div class="flex flex-col gap-1">
    <label {{$attributes->class(['input input-bordered flex items-center gap-2','input-error' => $errors->has($attributes->whereStartsWith('wire:model')->first())])}}>
        <input {{$attributes->merge(['type' => 'text'])->class(['grow'])}}/>
        {{$slot}}
    </label>
    @error($attributes->whereStartsWith('wire:model')->first())
    <span class="text-xs text-error text-center">
        {{$message}}
    </span>
    @enderror
</div>
