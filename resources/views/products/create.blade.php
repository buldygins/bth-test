@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <form action="{{route('product.store')}}" method="post">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @csrf
                <div class="form-group">
                    <label for="art">Артикул</label>
                    <input type="text" class="form-control" id="art" name="art" required>
                </div>
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label>Статус</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="available"
                               checked>
                        <label class="form-check-label" for="exampleRadios1">
                            available
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="exampleRadios2"
                               value="unavailable">
                        <label class="form-check-label" for="exampleRadios2">
                            unavailable
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="colour">Цвет</label>
                    <input type="text" class="form-control" id="colour" name="colour">
                </div>
                <div class="form-group">
                    <label for="price">Стоимость</label>
                    <input type="number" class="form-control" id="price" name="price" min="0">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
