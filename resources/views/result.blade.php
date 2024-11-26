@extends('layouts.app')

@section('title', 'Home - Quiz Game AGL')

@section('content')
<section class="py-5 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <div class="container text-center">
                <h2>Quiz Completed!</h2>
                <p>Your score: <strong>{{ $score }}</strong>/5</p>
                <a href="{{ route('home') }}" class="btn btn-primary">Play Again</a>
                <a href="{{ route('leaderboard') }}" class="btn btn-primary">Show Leaderboard</a>
            </div>
        </div>
    </div>
</section>
@endsection
