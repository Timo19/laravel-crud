@extends('layouts/app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif

                <a href="{{ route('players.create') }}" class="btn btn-success">Maak een nieuwe player aan</a>
                <hr>
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Naam</th>
                        <th>Leeftijd</th>
                        <th>Land</th>
                        <th>Sport</th>
                        <th>Wijzigen</th>
                        <th>Verwijderen</th>
                    </tr>
                    @foreach($players as $player)
                        <tr>
                            <td>{{ $player->id }}</td>
                            <td>{{ $player->name }}</td>
                            <td>{{ $player->age }}</td>
                            <td>{{ $player->country }}</td>
                            <td>{{ $player->sports }}</td>
                            <td><a href="{{ route('players.edit', $player->id) }}"><i class="fas fa-edit"></i></a></td>
                            <td><a href="{{ route('players.destroy', $player->id) }}" class="player-delete-button" data-player="{{ $player->id }}"><i class="fas fa-trash-alt"></i></a></td>
                            <form id="destroy-form-{{ $player->id }}" action="{{ route('players.destroy', $player->id) }}" method="POST" class="d-none">
                                @csrf
                                <input type="hidden" name="_method" value="delete" />
                            </form>
                        </tr>
                    @endforeach
                </table>

                {{ $players->links() }}

            </div>
        </div>
    </div>
@endsection