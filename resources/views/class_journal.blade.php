@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Imię</th>
                <th scope="col">Nazwisko</th>
                <th scope="col">Ocena</th>
                <th scope="col">Przedmiot</th>
                <th scope="col">Komentarz</th>
            </tr>
            </thead>
            <tbody>
            @foreach($journalStudent as $grade)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $grade->student->name }}</td>
                    <td>{{ $grade->student->surname }}</td>
                    <td>{{ $grade->value }}</td>
                    <td>{{ $grade->teacher->subject }}</td>
                    <td>{{ $grade->comment }}</td>
                    <th>
                        @if( Auth::check() && (Auth::user()->isAdmin() || Auth::user()->isTeacher()))
                            <a class="btn btn-warning active" href="{{ route('editGrade', ['grade'=>$grade->id]) }}" tabindex="-1" aria-disabled="true">Edytuj</a>
                            <a class="btn btn-danger active" href="{{ route('approveGrade', ['grade'=>$grade->id]) }}" tabindex="-1" aria-disabled="true">Usuń</a>
                        @endif
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$journalStudent->links()}}
        @if( Auth::check() && (Auth::user()->isAdmin() || Auth::user()->isTeacher()))
            <a class="btn btn-primary active" href="/new-grade" tabindex="-1" aria-disabled="true">Dodaj nową ocenę</a>
        @endif
    </div>
    <div class="container">
    <div class="container history">
        <h3>Historia modyfikacji ocen</h3>
        <table class="table table-striped table-hover">
            <tbody>
            @foreach($gradeLogs as $log)
                <tr>
                    <td>{{ $log->student->name }}</td>
                    <td>{{ $log->student->surname }}</td>
                    <td>{{ $log->value }}</td>
                    <td>{{ $log->teacher->surname }} {{ $log->teacher->surname }}</td>
                    <td>{{ $log->created_at }}</td>
                    <td>{{ $log->updated_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$gradeLogs->links()}}
    </div>
    </div>

@endsection

