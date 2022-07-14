@extends('layouts.admin', ['title' => '#' . $house->id])

@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-8">
                <h1 class="text-uppercase mt-3">{{ $house->title }}</h1>
                @if ($house->image)
                    <img class=" img-show" src="{{ asset('storage/' . $house->image) }}" alt="{{ $house->title }}">
                @endif
            </div>
            <div class="col-4 align-self-center">
                <div class="d-flex flex-column gap-2 mx-auto">
                    <a href="{{ route('admin.houses.edit', $house->id) }}" class="btn btn-warning text-uppercase"
                        type="button">Edit</a>
                </div>
                <div class="d-flex flex-column mt-2 mx-auto">
                    <form class=" mx-auto" action="{{ route('admin.houses.destroy', $house->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger text-uppercase"
                            @@click="openModal($event, {{ $house->id }})">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <h3 class="text-uppercase">Descrizione</h3>
                <p value="{{ $house->description }}">{!! $house->description !!}</p>
                <h3 class="text-uppercase">Prenotazioni</h3>
                <h5>Data inizio prenotazione: {{ date('d/m/Y', strtotime($house->check_in)) }}</h5>
                <h5>Data fine prenotazione: {{ date('d/m/Y', strtotime($house->check_out)) }}</h5>
                <h3 class="text-uppercase">Dettagli</h3>
                <p>Prezzo per notte: {{ $house->night_price }}€</p>
                <p>Numero di stanze per: {{ $house->n_room }}</p>
                <p>Numero di posti letto: {{ $house->n_bed }}</p>
                <p>Numero di bagni: {{ $house->n_bathroom }}</p>
                <p>Metri quadrati: {{ $house->square_meters }}</p>
                <h3 class="text-uppercase">Indirizzo</h3>
                <p>Indirizzo: {{ $house->address }}</p>
                <p>Città: {{ $house->city }}</p>
                <p>Stato: {{ $house->state }}</p>
                <p>Latitudine: {{ $house->latitude }}</p>
                <p>Longitude: {{ $house->longitude }}</p>
            </div>
            <div class="col-6">
                <h3 class="text-uppercase">Info</h3>
                <p class="border-bottom border-3 py-3 mb-0">Data creazione: {{ $house->created_at }}</p>
                <p class="border-bottom border-3 py-3 mb-0">Tipo: {{ $house->type ? $house->type->name : 'Not Defined' }}
                </p>
                @if ($house->visibility)
                    <p class="border-bottom border-3 py-3 mb-0 text-uppercase text-success fw-bold">Published</p>
                @else
                    <p class="border-bottom border-3 py-3 mb-0 text-uppercase text-danger fw-bold">To publish</p>
                @endif
                <div class="border-bottom border-3 py-3 ">
                    <p class="mb-0">Servizi:</p>
                    <ul>
                        @foreach ($house->services as $service)
                            <li>{{ $service->name }}</li>
                        @endforeach
                    </ul>
                </div>
                <div id="map-div"></div>
            </div>
        </div>
    </div>
@endsection
