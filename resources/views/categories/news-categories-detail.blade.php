@extends('layouts.main')
@section('content')
    <h1 class="h2">{{$payload->title}}</h1>
    <p>{{$payload->description}}</p>
@endsection
