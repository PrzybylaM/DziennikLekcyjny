@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Nauczyciele</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Imię</th>
                <th scope="col">Nazwisko</th>
                <th scope="col">Przedmiot</th>
            </tr>
            </thead>
            <tbody>
            @foreach($teachers as $teacher)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $teacher->name }}</td>
                    <td>{{ $teacher->surname }}</td>
                    <td>{{ $teacher->subject }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
