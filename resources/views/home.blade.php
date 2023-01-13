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
{{--        @foreach($journalStudent as $journal)--}}
{{--            <tr>--}}
{{--                <th scope="row">{{ $loop->iteration }}</th>--}}
{{--                <td>{{ $journal->Name }}</td>--}}
{{--                <td>{{ $journal->Surname }}</td>--}}
{{--                <td></td>--}}
{{--                <td></td>--}}
{{--                <td></td>--}}
{{--                <td class="buttonsInTable">--}}
{{--                    <button class="btn btn-warning" type="button">Edytuj</button>--}}
{{--                    <button class="btn btn-danger" type="button">Usuń</button>--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}
        </tbody>
    </table>

    <button class="btn btn-primary" type="button">Dodaj nową ocenę</button>
</div>
@endsection
