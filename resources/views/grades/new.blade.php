@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h1 class="title">Dodaj ocenę</h1>
                        <form method="POST" action="{{ route('addGrade') }}" onsubmit="return validateForm()">
                            @csrf
                            <div class="mb-3" >
                                <label for="exampleInputSurname" class="form-label">Komentarz</label>
                                <input type="text" class="form-control" id="comment" name="comment" required="required">
                            </div>

                            <div class="mb-3">
                                <select class="form-select" aria-label="Disabled select example" class="required" id="value"
                                        name="value" required>
                                    <option disabled selected>Wybierz ocenę</option>
                                    @foreach(config('grades.values') as $gradeValue)
                                        <option value="{{ $gradeValue }}">{{ $gradeValue }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <input type="hidden" name="teacher_id"
                                       value="{{ \Illuminate\Support\Facades\Auth::id() }}">
                            </div>

                            <div class="mb-3">
                                <select class="form-select" aria-label="Disabled select example" required="" id="select"
                                        name="student_id" required>
                                    <option disabled selected>Wybierz ucznia</option>
                                    @foreach($students as $student)
                                        <option
                                            value="{{ $student->id }}">{{ $student->name }} {{ $student->surname }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Dodaj</button>
                            <a class="btn btn-warning" href="/journal" tabindex="-1" aria-disabled="true">Cofnij</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{url('js/app.js')}}"></script>
@endsection
