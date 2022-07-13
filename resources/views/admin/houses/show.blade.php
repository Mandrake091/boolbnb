@extends('layouts.app')

<style>
    body,
    html {
        margin: 0;
        padding: 0;
    }

    #map-div {
        width: 50vw;
        height: 50vh;
    }
</style>

@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-8">
                <h1 class="text-uppercase mt-3">{{ $house->title }}</h1>
                @if ($house->image)
                    <img src="{{ $house->image }}" alt="{{ $house->title }}">
                @endif
            </div>
            <div class="col-4 align-self-center">
                <div class="d-flex flex-column gap-2 mx-auto">
                    <a href="{{ route('admin.houses.edit', $house->id) }}" class="btn btn-warning text-uppercase"
                        type="button">Edit</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <h3 class="text-uppercase">Descrizione</h3>
                <p>{{ $house->description }}</p>
            </div>
            <div class="col-6">
                <h3 class="text-uppercase">Info</h3>
                <p class="border-bottom border-3 py-3 mb-0">Creation Date: {{ $house->created_at }}</p>
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
            </div>
        </div>
    </div>
    
@endsection



    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.5.0/maps/maps-web.min.js"></script>

    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.5.0/services/services-web.min.js"></script>
    <div id="map-div"></div>
    <script src="{{ asset('js/admin.js') }}"></script>



