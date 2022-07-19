@extends('layouts.admin')

@section('content')
<<<<<<< HEAD
<section class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Crea nuovo appartamento</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.houses.store') }}" method="POST" enctype="multipart/form-data" id="sectionForm">
                        @csrf
                        <div class="form-group">
                            <label for="title" class="form-label">*Titolo</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" placeholder="Inserisci titolo" required>
                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group-description mx-auto">
                            <label for="contentEditor" class="form-label">Descrizione:</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="contentEditor" cols="30" rows="10">{{ old('description') }}</textarea>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="type" class="form-label">*Tipo di alloggio:</label>
                            <select name="type_id" id="type" class="form-control @error('type_id') is-invalid @enderror" required>
                                <option value="">Seleziona un tipo di alloggio</option>
                                @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
=======
    <section class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Crea nuovo appartamento</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.houses.store') }}" method="POST" enctype="multipart/form-data"
                            id="sectionForm">
                            @csrf
                            <div class="form-group">
                                <label for="title" class="form-label">Titolo</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" name="title" value="{{ old('title') }}"
                                    placeholder="Inserisci titolo" required>
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group-description mx-auto">
                                <label for="contentEditor" class="form-label">Descrizione:</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="contentEditor"
                                    cols="30" rows="10">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="type" class="form-label">Tipo di alloggio:</label>
                                <select name="type_id" id="type"
                                    class="form-control @error('type_id') is-invalid @enderror" required>
                                    <option value="">Seleziona un tipo di alloggio</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
>>>>>>> fix-price-night

                            </select>
                            @error('type_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <img id="uploadPreview" width="100" src="https://via.placeholder.com/300x200">
                            <label for="image">*Aggiungi immagine</label>
                            <input type="file" id="image" name="image" onchange="boolpress.previewImage();">
                            @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

<<<<<<< HEAD
                        <div class="form-group">
                            <h5>*Servizi</h5>
                            @foreach ($services as $service)
                            <label class="form-check-label" for="services">{{ $service->name }}</label>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input my-checkbox" {{ in_array($service->id, old('services', [])) ? 'checked' : '' }} id="{{ $service->name }}" name="services[]" value="{{ $service->id }}">
                            </div>
                            @endforeach
                            @error('services')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
=======
                            <div class="form-group">
                                <h5>Servizi</h5>
                                @foreach ($services as $service)
                                    <label class="form-check-label" for="services">{{ $service->name }}</label>
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input my-checkbox"
                                            {{ in_array($service->id, old('services', [])) ? 'checked' : '' }}
                                            id="{{ $service->name }}" name="services[]" value="{{ $service->id }}">
                                    </div>
                                @endforeach
                                @error('services')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
>>>>>>> fix-price-night



                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input  @error('visibility') is-invalid @enderror" {{ old('visibility') ? 'checked' : '' }} id="visibility" name="visibility">
                            <label class="form-check-label" for="visibility">Visibile</label>
                            @error('visibility')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

<<<<<<< HEAD
                        <div class="form-group">
                            <label for="night_price" class="form-label">*Prezzo per notte</label>
                            <input min="1" type="number" class="form-control @error('night_price') is-invalid @enderror" id="night_price" name="night_price" value="{{ old('night_price') }}" placeholder="Inserisci prezzo per notte" required>
                            @error('night_price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="n_room" class="form-label">*Numero di stanze:</label>
                            <input min="1" type="number" class="form-control @error('n_room') is-invalid @enderror" id="n_room" name="n_room" value="{{ old('n_room') }}" placeholder="Inserisci numero di stanze" required>
                            @error('n_room')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="n_bed" class="form-label">*Numero di posti letto</label>
                            <input min="1" type="number" class="form-control @error('n_bed') is-invalid @enderror" id="n_bed" name="n_bed" value="{{ old('n_bed') }}" placeholder="Inserisci numero di posti letto" required>
                            @error('n_bed')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="n_bathroom" class="form-label">*Numero di bagni:</label>
                            <input min="1" type="number" class="form-control @error('n_bathroom') is-invalid @enderror" id="n_bathroom" name="n_bathroom" value="{{ old('n_bathroom') }}" placeholder="Inserisci numero di bagni" required>
                            @error('n_bathroom')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="square_meters" class="form-label">*Metri quadrati:</label>
                            <input min="1" type="number" class="form-control @error('square_meters') is-invalid @enderror" id="square_meters" name="square_meters" value="{{ old('square_meters') }}" placeholder="Inserisci numero di metri quadrati" required>
                            @error('square_meters')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="state" class="form-label">*Stato</label>
                            <input type="text" class="form-control @error('state') is-invalid @enderror" id="state" name="state" value="{{ old('state') }}" placeholder="Inserisci titolo" required>
                            @error('state')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="city" class="form-label">*Città</label>
                            <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{ old('city') }}" placeholder="Inserisci titolo" required>
                            @error('city')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address" class="form-label">*Indirizzo</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}" placeholder="Inserisci titolo" required>
                            @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="form-group">
                                <label for="latitude" class="form-label">*Lat</label>
=======
                            <div class="form-group">
                                <label for="night_price" class="form-label">Prezzo per notte</label>
                                <input min="1" type="number"
                                    class="form-control @error('night_price') is-invalid @enderror" id="night_price"
                                    name="night_price" value="{{ old('night_price') }}"
                                    placeholder="Inserisci prezzo per notte" required>
                                @error('night_price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="n_room" class="form-label">Numero di stanze:</label>
                                <input min="1" type="number"
                                    class="form-control @error('n_room') is-invalid @enderror" id="n_room" name="n_room"
                                    value="{{ old('n_room') }}" placeholder="Inserisci numero di stanze" required>
                                @error('n_room')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="n_bed" class="form-label">Numero di posti letto</label>
                                <input min="1" type="number"
                                    class="form-control @error('n_bed') is-invalid @enderror" id="n_bed" name="n_bed"
                                    value="{{ old('n_bed') }}" placeholder="Inserisci numero di posti letto" required>
                                @error('n_bed')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="n_bathroom" class="form-label">Numero di bagni:</label>
                                <input min="1" type="number"
                                    class="form-control @error('n_bathroom') is-invalid @enderror" id="n_bathroom"
                                    name="n_bathroom" value="{{ old('n_bathroom') }}"
                                    placeholder="Inserisci numero di bagni" required>
                                @error('n_bathroom')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="square_meters" class="form-label">Metri quadrati:</label>
                                <input min="1" type="number"
                                    class="form-control @error('square_meters') is-invalid @enderror" id="square_meters"
                                    name="square_meters" value="{{ old('square_meters') }}"
                                    placeholder="Inserisci numero di metri quadrati" required>
                                @error('square_meters')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="state" class="form-label">Stato</label>
                                <input type="text" class="form-control @error('state') is-invalid @enderror"
                                    id="state" name="state" value="{{ old('state') }}"
                                    placeholder="Inserisci titolo" required>
                                @error('state')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="city" class="form-label">Città</label>
                                <input type="text" class="form-control @error('city') is-invalid @enderror"
                                    id="city" name="city" value="{{ old('city') }}"
                                    placeholder="Inserisci titolo" required>
                                @error('city')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="address" class="form-label">Indirizzo</label>
                                <input type="text" class="form-control search @error('address') is-invalid @enderror"
                                    id="address" name="address" value="{{ old('address') }}"
                                    placeholder="Inserisci titolo" required>
                                @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- <div class="form-group">
                                <label for="latitude" class="form-label">Lat</label>
>>>>>>> fix-price-night
                                <input step="any" type="number" class="form-control @error('latitude') is-invalid @enderror"
                                    id="latitude" name="latitude" value="{{ old('latitude') }}"
                        placeholder="Inserisci numero di bagni" required>
                        @error('latitude')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                </div> --}}
                {{-- <div class="form-group">
                                <label for="longitude" class="form-label">*Long</label>
                                <input step="any" type="number" class="form-control @error('longitude') is-invalid @enderror"
                                    id="longitude" name="longitude" value="{{ old('longitude') }}"
                placeholder="Inserisci numero di bagni" required>
                @error('longitude')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div> --}}
            <div class="form-group">
                <label for="check_in" class="form-label">*Check in</label>
                <input type="date" class="form-control @error('check_in') is-invalid @enderror" id="check_in" name="check_in" value="{{ old('check_in') }}" placeholder="Inserisci numero di bagni" required>
                @error('check_in')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="check_out" class="form-label">*Check out</label>
                <input type="date" class="form-control @error('check_out') is-invalid @enderror" id="check_out" name="check_out" value="{{ old('check_out') }}" placeholder="Inserisci numero di bagni" required>
                @error('check_out')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <p class="text-secondary d-flex justify-content-end px-3">*Tutti i campi contrassegnati con l'asterisco sono obbligatori</p>
            </div>
<<<<<<< HEAD

            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    </div>
    @push('head')
    <!-- Styles -->
    <script src="{{ asset('js/scriptValidazione.js') }}" defer></script>
    @endpush
    </div>
</section>
<script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">
    bkLib.onDomLoaded(nicEditors.allTextAreas);
</script>
@endsection
=======
            @push('head')
                <!-- Styles -->
                <script src="{{ asset('js/scriptValidazione.js') }}" defer></script>
                <script src="{{ asset('js/autocompleteSearch.js') }}" defer></script>
                <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
                <script type="text/javascript">
                    bkLib.onDomLoaded(nicEditors.allTextAreas);
                </script>
            @endpush
        </div>
    </section>
@endsection
>>>>>>> fix-price-night
