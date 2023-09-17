@extends('layouts.main')
@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">{{$payload->title}}</h1>
            </div>
        </div>
    </section>
    <div class="album py-5 bg-body-tertiary">
        <div class="container">{!! $payload->description !!}</div>
    </div>
@endsection
