@extends('layouts.app')

@section('title')
    <title>Kontakt</title>
@endsection

@section('content')
    <div class="container">
        <h1 class="text-center">Kontakt</h1>
        <div class="row mt-5">
            <div class="col-5 fs-4">
                <hr>
                <p>Adres: ul. Bolesławiecka 1/U4, Wrocław</p>
                <p>Telefon: 666 666 666</p>
                <hr>
                <h2 class="text-center">Godziny otwarcia</h2>
                <p class="text-center text-danger mt-3 fw-bolder">Jesteśmy czynni 24/7 365 dni w roku!</p>
            </div>
            <div class="col-3">
                <iframe
                    style="rounded mx-auto d-block"
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d626.1564014627037!2d17.000791148039454!3d51.11536750061829!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470febe52ee5d60f%3A0xdda362328b598f68!2sDobry%20Fryzjer%20Wroc%C5%82aw%20%F0%9F%92%87%20-%20Dagmara%20%C5%81uczak!5e0!3m2!1spl!2spl!4v1641936920811!5m2!1spl!2spl"
                    allowfullscreen="allowfullscreen"
                    width="600"
                    height="450"
                ></iframe>
            </div>
        </div>
    </div>
@endsection
