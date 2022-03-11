@extends('Dashboard.layout')

@section('content')
@include('Dashboard.fragment.errorsForm')

<h1>Crear Post</h1>

<form action="{{route('post.store')}}" method="post">
    @include('Dashboard.fragment.formPost')
</form>
@endsection