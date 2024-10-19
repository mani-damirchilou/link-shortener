@extends('root')
@section('content')
    <div class="h-screen flex flex-col justify-center items-center gap-5">
        <div class="card bg-base-300 compact">
            <div class="card-body prose">
                <h2>{{$title}}</h2>
            </div>
        </div>
        <div class="card bg-base-300">
            <div class="card-body">
                {{$slot}}
            </div>
        </div>
    </div>
@endsection
