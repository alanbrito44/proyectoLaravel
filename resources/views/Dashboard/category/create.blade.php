@extends('Dashboard.layout')

@section('content')
@include('Dashboard.fragment.errorsForm')

<h1>Crear categoria</h1>

<form action="{{route('category.store')}}" method="post">
    @csrf

    <label for="">Titulo</label>
    <input type="text" name="title" value="{{ old("title",$category->title) }}">

    <label for="">Slug</label>
    <input type="text" name="slug" value="{{ old("slug",$category->slug) }}">

    <button type="submit">Enviar</button>

</form>
@endsection