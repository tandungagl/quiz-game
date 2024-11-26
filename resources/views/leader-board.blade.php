@extends('layouts.app')

@section('title', 'Home - Quiz Game AGL')

@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="row">
                <div class="col-lg-6 col-md-8 mx-auto mb-5">
                    <h1 class="fw-light">Leader Board</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-8 mx-auto">
                <div class="container text-center">
                    <div class="card shadow-lg">
                        <div class="card-header bg-success text-white text-center">
                            <h3 class="mb-0">Top 10 Players</h3>
                        </div>
                        <ul class="list-group list-group-flush">
                            <!-- Danh sách người chơi -->
                            @foreach ($data as $key => $player)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span class="fw-bold text-success">{{ $key + 1 }}</span>
                                    <span class="flex-grow-1 ms-3">{{ $player->name }}</span>
                                    <span class="fw-bold">{{ $player->score }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="container text-center my-3">
                    <a href="{{ route('home') }}" class="btn btn-primary">Play Again</a>
                </div>
            </div>
        </div>
    </section>
@endsection
