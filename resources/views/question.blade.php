@extends('layouts.app')

@section('title', 'Home - Quiz Game AGL')

@section('content')
    <section class="py-5 text-center container">
        <div class="row">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Question {{ $index + 1 }}</h1>
            </div>
        </div>
    </section>
    <form action="{{ route('question.answer') }}" method="POST">
        <div class="container question-container my-1">
            <div class="question ml-sm-5 pl-sm-5 pt-2">
                @csrf
                <input type="hidden" name="question_id" value="{{ $question->id }}">
                <input type="hidden" name="current_index" value="{{ $index }}">
                <div class="py-2 h5"><b>{{ $question->question }}</b></div>
                <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                    <label class="options">{{ $question->option_a }}
                        <input type="radio" name="answer" value="1">
                        <span class="checkmark"></span>
                    </label>
                    <label class="options">{{ $question->option_b }}
                        <input type="radio" name="answer" value="2">
                        <span class="checkmark"></span>
                    </label>
                    <label class="options">{{ $question->option_c }}
                        <input type="radio" name="answer" value="3">
                        <span class="checkmark"></span>
                    </label>
                    <label class="options">{{ $question->option_d }}
                        <input type="radio" name="answer" value="4">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
            <div class="d-flex align-items-center pt-3 gap-3">
                @if ($index > 0)
                    <div id="prev" class="ml-3">
                        <button type="submit" name="action" value="prev" class="btn btn-prev">Previous</button>
                    </div>
                @endif
                @if ($index < count(session('questions')) - 1)
                    <div class="ml-auto mr-sm-5">
                        <button type="submit" name="action" value="next" class="btn btn-next">Next</button>
                    </div>
                @else
                    <div class="ml-auto mr-sm-5">
                        <a href="{{ route('question.finish') }}" class="btn btn-next">Finish</a>
                    </div>
                @endif
            </div>
        </div>
    </form>
@endsection
