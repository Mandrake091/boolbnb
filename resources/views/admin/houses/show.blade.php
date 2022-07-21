@extends('layouts.admin', ['title' => '#' . $house->id])

@section('content')

    <!-- modal delete -->
    <div class="modal fade" tabindex="-1" id="deleteModalShow" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <img src="/images/boolbnb.png" width="150">
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <p>Vuoi cancellare questo post?</p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
            <button type="button" class="btn btn-danger" @@click="submitForm()">si cancella</button>
            </div>
        </div>
        </div>
    </div>
    <!-- modal delete -->

    <div class="container">
        <div class="row mb-3">
            <div class="col-8 h-75">
                <h2 class="text-uppercase">{{ $house->title }}</h2>
                @if ($house->image)
                    <img class=" img-show" src="{{ asset('storage/' . $house->image) }}" alt="{{ $house->title }}">
                @endif
                <div class="mt-4">
                    <h3 class="text-uppercase">Descrizione</h3>
                    <p value="{{ $house->description }}">{!! $house->description !!}</p>
                    <h3 class="text-uppercase">Prenotazioni</h3>
                    <h5>Data inizio prenotazione: {{ date('d/m/Y', strtotime($house->check_in)) }}</h5>
                    <h5>Data fine prenotazione: {{ date('d/m/Y', strtotime($house->check_out)) }}</h5>
                    <div class="row mt-4">
                        <div class="col-6">
                            <h3 class="text-uppercase">Dettagli</h3>
                            <p>Prezzo per notte: {{ $house->night_price }}€</p>
                            <p>Numero di stanze per: {{ $house->n_room }}</p>
                            <p>Numero di posti letto: {{ $house->n_bed }}</p>
                            <p>Numero di bagni: {{ $house->n_bathroom }}</p>
                            <p>Metri quadrati: {{ $house->square_meters }}</p>
                        </div>


                        <div class="col-6">
                            <h3 class="text-uppercase">Indirizzo</h3>
                            <p>Indirizzo: {{ $house->address }}</p>
                            <p>Città: {{ $house->city }}</p>
                            <p>Stato: {{ $house->state }}</p>
                            <p id="latitude">Latitudine: {{ $house->latitude }}</p>
                            <p id="longitude">Longitude: {{ $house->longitude }}</p>
                        </div>
                    </div>
                    <div>
                        <h3>Messaggi: </h3>
                        @foreach ($house->messages as $message)
                            Nome: {{ $message->name }} <br>
                            Cognome: {{ $message->surname }} <br>
                            Email: {{ $message->email }}<br>
                            {{ $message->text }}
                        @endforeach

                    </div>

                </div>
            </div>
            <div class="col-4">
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

                <div class="text-center">
                    <a href="{{ route('admin.houses.edit', $house->id) }}"
                        class="w-50 mt-2 btn btn-warning text-uppercase" type="button">Edit</a>
                </div>
                <div class="mt-2 text-center">
                    <form class=" mx-auto" action="{{ route('admin.houses.destroy', $house->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-50 btn btn-danger text-uppercase delete"
                            @@click="openModalShow($event, {{ $house->id }})">Elimina</button>
                    </form>

                </div>
            </div>
        </div>
        @push('head')
            <!-- Styles -->
            <script src="{{ asset('js/map.js') }}" defer></script>
        @endpush

    </div>
@endsection
