@extends('layouts/app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('players.update', $player->id) }}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="patch">
                    <div class="form-group">
                        <label>ID</label>
                        <input type="text" class="form-control" name="id" value="{{ $player->id }}" disabled="disabled">
                    </div>
                    <div class="form-group">
                        <label>Naam</label>
                        <input type="text" class="form-control" name="name" value="{{ $player->name }}">
                    </div>
                    <div class="form-group">
                        <label>Leeftijd</label>
                        <input type="text" class="form-control" name="age" value="{{ $player->age }}">
                    </div>
                    <div class="form-group">
                        <label>Land</label>
                        <input type="text" class="form-control" name="country" value="{{ $player->country }}">
                    </div>
                    <div class="form-group">
                        <label>Sport</label>
                        <input type="text" class="form-control" name="sports" value="{{ $player->sports }}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Sla op</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection