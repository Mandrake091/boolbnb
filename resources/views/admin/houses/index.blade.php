@extends('layouts.admin')

@section('content')
 
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Dashboard') }}</div>
                        <h1>Tutte le tue case</h1>
                        @foreach ($houses as $post)
                            <tr>
                                <th scope="row">{{ $post->id }}</th>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->created_at }}</td>
                                <td>
                                    <a href="{{ route('admin.houses.show', $post->id) }}" class="btn cs_btn">View</a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.houses.destroy', $post->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger text-uppercase"
                                            @@click="openModal($event, {{ $post->id }})">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                 


                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
