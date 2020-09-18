@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <form method="POST" action="{{route('player.store')}}">
                @csrf
                <div class="form-group">
                    <label for="nameInput">Email address</label>
                    <input type="text" class="form-control" id="nameInput" name="nome" required>
                </div>
                <select class="custom-select" name="level">
                    <option disabled selected required>Open this select menu</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" value="1" name="goleiro">
                    <label class="form-check-label" for="exampleCheck1">Goleiro?</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
