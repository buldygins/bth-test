@extends('layouts.app')
@section('content')
    <div class="container mb-5">
        @if (\Session::has('message'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('message') !!}</li>
                </ul>
            </div>
        @endif
        <div class="row">
            <a href="{{route('product.create')}}">Добавить</a>
        </div>
        <div class="row">
            @if(count($products) > 0)
                <table class="table table-bordered">
                    <thead>
                    <th scope="col">Name</th>
                    <th scope="col">Art</th>
                    <th scope="col">Data</th>
                    <th scope="col">Action</th>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->name}}</td>
                            <td>{{$product->art}}</td>
                            <td>
                                @foreach($product->data as $key => $value)
                                    @if(!empty($value))
                                        <span>{{$key}}:{{$value}}</span>
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                <div class="container">
                                    <div class="row">
                                        <a href="{{route('product.edit',$product->id)}}">Изменить</a>
                                    </div>
                                    @if($product->trashed())
                                        <div class="row">
                                            <form action="{{route('product.restore',$product->id)}}" method="post">
                                                @csrf
{{--                                                @method('PATCH')--}}
                                                <button type="submit">Восстановить</button>
                                            </form>
                                        </div>
                                    @else
                                        <div class="row">
                                            <form action="{{route('product.destroy',$product->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">Удалить</button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$products->links()}}
            @else
                <span>Продуктов нет.</span>
            @endif
        </div>
    </div>
@endsection
