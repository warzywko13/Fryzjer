@extends('layouts.app')

@section('title')
    <title>Rezerwacja</title>
@endsection

@section('content')
        <div class="container">
            <article>
                @if($errors->any())
                    <div class="container">
                        <div class="alert alert-danger" role="alert">
                            {{$errors->first()}}
                        </div>
                    </div>
                @endif
                @if(\Session::has('success'))
                    <div class="container">
                        <div class="alert alert-success" role="alert">
                            {{\Session::get('success')}}
                        </div>
                    </div>
                @endif
                <div class="text-center">
                    <a href="/reservation/create/" class="btn btn-secondary btn-lg">Dodaj nową wizytę</a>
                </div>
                    <div class="d-flex justify-content-end">
                    <form id="searchDate" action="/reservation/searchDate/" method="get">
                        @csrf
                        <input type="date" name="date" id="date" value="{{old('date')}}">
                        <button class="btn btn-primary">Szukaj</button>
                    </form>
                </div>

                @foreach ($reservations as $reservation)
                    <div class="d-flex shadow p-3 mb-5 mt-3 bg-body rounded">
                        <div class="flex-grow-1 p-2 mb-1">
                            <div class="fw-bold">Login: <span class="fw-normal">{{ $reservation->user }}</span></div>
                            <div class="fw-bold">Data wizyty: <span class="fw-normal">{{ $reservation->visitDate }}</span></div>
                            <div class="fw-bold">Godzina wizyty: <span class="fw-normal">{{ $reservation->hourDate }}</span></div>
                            <div class="fw-bold">Usługa: <span class="fw-normal">{{ $reservation->procedure }}</span></div>
                        </div>
                        @if(!is_null(Auth::user()))
                            @if($reservation->user == Auth::user()->name)
                                <div class="p-2 m-auto">
                                    <a href="/reservation/edit/{{ $reservation->id }}" class="btn btn-primary">Edycja</a>
                                </div>
                                <div class="p-2 m-auto">
                                    <form action="/reservation/delete/{{ $reservation->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Usuń</button>
                                    </form>
                                </div>
                            @endif
                        @endif
                    </div>
                @endforeach
                {{ $reservations->links() }}

            </article>
        </div>
@endsection
