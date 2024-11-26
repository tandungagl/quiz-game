@extends('layouts.app')

@section('title', 'Home - Quiz Game AGL')

@section('content')
    <section class="py-5 text-center container">
        <div class="row">
            <div class="col-lg-6 col-md-8 mx-auto mb-5">
                <h1 class="fw-light">Entry Your Name</h1>
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <form method="POST" action="{{ route('submit.name') }}">
                @csrf
                <div class="col-auto">
                    <input type="text" name="player_name" class="form-control" placeholder="Input name here">
                </div>
                @error('player_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary mt-5">Submit</button>
            </form>
        </div>
    </section>
@endsection
