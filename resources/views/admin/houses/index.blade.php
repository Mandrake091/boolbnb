@extends('layouts.admin')
@section('content')
    <!-- modal delete -->
    <div class="modal fade" tabindex="-1" id="deleteModal" aria-hidden="true">
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
        <div class="row justify-content-center">
            <div class="col-md-10 flex-nowrap">
                <div class="card flex-row flex-wrap">
                    <div class="card-header w-100 text-center"><h5>{{ __('Dashboard') }}</h5>
                        {{-- <div class="card-body p-0">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            {{ __('You are logged in!') }}
                        </div> --}}
                        <a href="{{route('admin.houses.create')}}"><button class="btn btn-success">Inserisci una nuova casa</button></a>
                    </div>
                    <h1 class="w-100 text-center pt-3">Tutte le tue case</h1>
                    <div class="width-100">
                        @if (session()->has('message'))
                            <div class="alert alert-success mb-3 mt-3">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                    </div>
                    
                    @foreach ($houses as $post)
                        <div class="card mx-auto my-3" style="width: 18rem;">
                            @if ($post->image)
                                <img class="img-fluid img-dimensions" src="{{ asset('/storage/' . $post->image) }}"
                                    alt="{{ $post->title }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text card-text-index">{!! $post->description !!}</p>
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-around">
                                    <a href="{{ route('admin.houses.show', $post->id) }}"
                                        class="btn btn-primary">Visualizza</a>
                                    <form action="{{ route('admin.houses.destroy', $post->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger delete"
                                            @@click="openModal($event, {{ $post->id }})">Elimina</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
