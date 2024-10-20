<div x-data="{open:false}">
    <div @click="open = true">{{$toggler}}</div>
    <dialog class="modal" :class="{'modal-open': open}">
        <div class="modal-box">
            <div class="flex justify-between items-center">
                <h1 class="text-lg">
                    {{$title}}
                </h1>
                <button class="btn btn-ghost bg-base-300" @click="open = false">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="divider"></div>
            {{$slot}}
        </div>
        <button @click="open = false" class="modal-backdrop"></button>
    </dialog>
</div>
