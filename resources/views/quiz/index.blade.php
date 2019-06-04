@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
              <div class="card-header  border-0">Quiz Questions
                <span class="float-right">Duration :
                 <span class="badge badge-danger" style="font-size:17px" id='timer' data-timer="{{ auth()->user()->userTest->timer }}"></span></span>
                </div>

                <div class="card-body ">
                <form  action="{{ route('store') }}" method="post" id="quiz_app">
                  @csrf()
                  @forelse ($questions as $value => $question)
                    <div class="pb-3" data-question="{{ $loop->iteration }}">

                    <h1 class="display-4">
                      {{ $loop->iteration . "." .$question->question }}
                    </h1>
                    <div class="pt-5 h4">
                     <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="question_{{ $question->id }}" id="q1_{{ $question->id }}" value="option1">
                      <label class="form-check-label" for="q1_{{ $question->id }}">{{ $question->option1 }}</label>
                     </div>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="question_{{ $question->id }}" id="q2_{{ $question->id }}" value="option2">
                      <label class="form-check-label" for="q2_{{ $question->id }}">{{ $question->option2 }}</label>
                    </div>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="question_{{ $question->id }}" id="q3_{{ $question->id }}" value="option3">
                      <label class="form-check-label" for="q3_{{ $question->id }}">{{ $question->option3 }}</label>
                    </div>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="question_{{ $question->id }}" id="q4_{{ $question->id }}" value="option4">
                      <label class="form-check-label" for="q4_{{ $question->id }}">{{ $question->option4 }}</label>
                    </div>
                  </div>
                  </div>

                  @empty

                    <h5> No Question available </h5>

                  @endforelse

                  <button type="submit" class="btn btn-success float-right">Submit </button>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
  <script src="{{ asset('js/quiz.js') }}"></script>
@endpush
