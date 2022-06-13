@extends('layouts.app')

@section('title')
    <title>Edycja rezerwacji</title>
@endsection

@section('content')
    @if($errors->any())
        <div class="container">
            <div class="alert alert-danger" role="alert">
                {{ $errors->first() }}
            </div>
        </div>
    @endif

    <div class="container">
        <form action="/reservation/update/{{ $reservation -> id }}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="visitDate">Data wizyty:</label>
                <input type="date" class="form-control" id="visitDate" name="visitDate" value="{{ $reservation -> visitDate }}">
            </div>
            <div class="form-group">
                <label for="hourDate">Godzina przyjścia</label>
                <input type="time" class="form-control" id="hourDate" name="hourDate" value="{{ $reservation -> hourDate }}">
            </div>
            <div class="form-group">
                <label for="procedure">Zabieg</label>
                <input type="text" class="form-control" id="procedure" name="procedure" value="{{ $reservation -> procedure }}">
            </div>
            <button type="submit" class="mt-3 btn btn-lg btn-primary d-block m-auto">Edytuj</button>
        </form>
    </div>
@endsection
