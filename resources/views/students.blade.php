@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Uczniowie</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Imię</th>
                <th scope="col">Nazwisko</th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr>
                    <th scope="row"> {{ $loop->iteration }}</th>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->surname }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

