@extends('layouts.app')

@section('content')
    @if( Auth::check() && (Auth::user()->isAdmin()))
    <div class="container">
        <h2>Użytkownicy</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Imię</th>
                <th scope="col">Nazwisko</th>
                <th scope="col">Przedmiot</th>
                <th scope="col">Rola</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->surname }}</td>
                    @if($user->role!='NULL')
                        <td>{{ $user->subject }}</td>
                    @else
                        <td></td>
                    @endif
                    <td>{{ $user->role }}</td>
                    <td>
                        <a class="btn btn-warning active" href="{{ route('showUser', ['user'=>$user->id]) }}" tabindex="-1" aria-disabled="true">Edytuj</a>
                        <a class="btn btn-danger active" href="{{ route('approveUser', ['user'=>$user->id]) }}" tabindex="-1" aria-disabled="true">Usuń</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @else
        <h1>Brak uprawnień do wyświetlenia tej strony</h1>
    @endif
@endsection
