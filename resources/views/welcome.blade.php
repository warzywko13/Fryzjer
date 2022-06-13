@extends('layouts.app')

@section('title')
    <title>Start</title>
@endsection

@section('content')
<main>
    <div class="container text-center">
        <h1 class="fw-bold">Zakład Fryzjerski "Amor"</h1>

        <div class="d-block m-auto mt-5 mb-5">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{URL::asset('/img/inside-gbc24da732_1920.jpg')}}" class="text-center img-fluid rounded" alt="Gabinet fryzjerski">
                </div>
                <div class="col-md-5 m-auto mt-2">
                    <h2 class="text-decoration-underline">O nas</h2>

                    <p class="fs-5">
                        Przez szereg lat zdobyliśmy szereg certyfikatów z zawodu i uznanie dziesiątek zadowolonych kobiet i mężczyzn.
                        Od 2012 roku działamy na rynku Wrocławskim, do tej pory zlokalizowani byliśmy w CH Astra, a następnie na Bulwarze
                        Ikara. Od 2021 roku znajdujemy się na ulicy Bolesławieckiej (od strony Legnickiej) we Wrocławiu. Jesteśmy pewni,
                        że jeżeli zdecydujesz się powierzyć nam swoje włosy, także dołączysz do grona naszych stałych klientek i klientów!
                    </p>
                </div>
            </div>
        </div>

        <article>
            <h3 class="fst-italic text-decoration-underline">Zarezerwować wizytę można poprzez stronę <span class="fw-bolder">Rezerwacja</span></h3>
        </article>
    </div>
</main>
@endsection
