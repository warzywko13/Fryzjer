@extends('layouts.app')

@section('title')
    <title>Nowa rezerwacja</title>
@endsection

@section('content')
    @if($errors->any())
        <div class="container">
            <div class="alert alert-danger" role="alert">
                {{$errors->first()}}
            </div>
        </div>
    @endif

    <div class="container">
        <h1 class="text-center fs-2 text-primary"><span class="fw-bolder">UWAGA!</span> Jedna wizyta na godzinę!</h1>
        <form action="/reservation/store" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="visitDate">Data wizyty:</label>
                <input type="date" class="form-control" id="visitDate" name="visitDate" value="{{old('visitDate')}}">
            </div>
            <div class="form-group">
                <label for="hourDate">Godzina przyjścia</label>
                <input type="time" class="form-control" id="hourDate" name="hourDate" value="{{old('hourDate')}}">
            </div>
            <div class="form-group">
                <label for="procedure">Zabieg</label>
                <input type="text" class="form-control" id="procedure" name="procedure" value="{{old('procedure')}}">
            </div>
            <button type="submit" class="mt-3 btn btn-lg btn-primary d-block m-auto">Rejestruj</button>
        </form>
    </div>
@endsection
