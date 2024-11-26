@extends('layouts.app')

@section('title', 'Home - Quiz Game AGL')

@section('content')
<section class="py-5 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Wellcome to Quiz Game AGL</h1>
            <p class="lead text-muted"><p class="mb-1">Quiz Game AGL &copy; is an exciting trivia game that challenges and enhances your
                knowledge!</p>
            <p class="mb-0">New to Quiz Game? </p>
            <p>
                <a href="{{ route('entry.name') }}" class="btn btn-primary my-2">Play NOW!</a>
            </p>
        </div>
    </div>
</section>
@endsection
