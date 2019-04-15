@extends('layouts.app')

{{--@section('navigation')--}}
{{--    <navigation></navigation>--}}
{{--@endsection--}}

@section('content')
    <h1 class="heading">Todos</h1>
    <todos :items="{{$todos}}"></todos>
@endsection
