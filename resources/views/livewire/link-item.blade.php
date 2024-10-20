<div>
    <div class="bg-base-300 p-5 my-2 rounded-lg flex justify-between items-center gap-5">
        <span class="bg-base-100 p-2 rounded-lg">
            {{$link->url}}
        </span>
        <x-clipboard :value="route('link',$link->slug)"/>
    </div>
</div>
