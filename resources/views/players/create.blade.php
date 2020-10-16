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

                <form action="{{ route('players.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Naam</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label>Leeftijd</label>
                        <input type="text" class="form-control" name="age">
                    </div>
                    <div class="form-group">
                        <label>Land</label>
                        <input type="text" class="form-control" name="country">
                    </div>
                    <div class="form-group">
                        <label>Sport</label>
                        <input type="text" class="form-control" name="sports">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Maak aan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection