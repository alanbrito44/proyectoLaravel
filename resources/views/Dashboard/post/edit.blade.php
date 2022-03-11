@extends('Dashboard.layout')

@section('content')
@include('Dashboard.fragment.errorsForm')

<h1>Actualizar Post: {{ $post->title }}</h1>

<form action="{{route('post.update', $post->id)}}" method="post" enctype="multipart/form-data">
    @method("PUT")
    @include('Dashboard.fragment.formPost',["task" => "edit"])
</form>
@endsection