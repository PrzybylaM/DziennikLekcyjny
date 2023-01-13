@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h1 class="title">Czy na pewno chcesz usunać ocenę?</h1>
                        <form method="POST" action="">
                            @csrf
                            <div class="mb-3">
                            </div>
                            <a class="btn btn-danger" href="{{ route('deleteGrade', ['grade'=>$grade->id]) }}" tabindex="-1" aria-disabled="true">Usuń</a>
                            <a class="btn btn-warning" href="/journal" tabindex="-1" aria-disabled="true">Anuluj</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
