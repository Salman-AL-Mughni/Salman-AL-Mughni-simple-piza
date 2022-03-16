@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Menu') }}</div>
                    <div class="card-body">
                       @if (Auth::check())
                       <form action="{{ route('pizzas.store')}}" method="post">@csrf
                        <div class="form-group ">
                            <p>Name:{{auth()->user()->name}}</p>
                            <p>Email:{{auth()->user()->email}}</p>
                            <p>Phone number: <input type="number" class="form-control" name="phone"></p>
                            <p>Small pizza order <input type="number" class="form-control" name="small_pizza" value="0"></p>
                            <p>Medium pizza order <input type="number" class="form-control" name="medium_pizza" value="0"></p>
                            <p>Large pizza order <input type="number" class="form-control" name="large_pizza" value="0"></p>
                            <p><input type="hidden" name="pizza_id" value="{{$pizza->id}}"></p>
                            <p><input type="date" name="date" class="form-control" required></p>
                            <p><input type="time" name="time" class=" form-control" required></p>
                            <p><textarea class="form-control" name="body" required></textarea></p>
                            <p class="text-center">
                                <button class="btn btn-danger" type="submit">Make order</button>
                            </p>
                            @if (session('message'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('message') }}
                                </div>
                            @endif

                            @if (session('errmessage'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('errmessage') }}
                            </div>
                            @endif
                        </div>
                    </form>
                       @else
                        <p><a href="{{ route('login') }}">Please Login To Make Order</a></p>
                       @endif
                    </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                            <img width="500px" class="img-thumbnail center" src="{{asset('images/pizza/'.$pizza->image)}}" >
                            <p><h3>{{ $pizza->name }}</h3></p>
                            <p><h3>{{ $pizza->description }}</h3></p>
                            <p>Small Pizza Price  :  ${{ $pizza->small_pizza_price }}</p>
                            <p>Medium Pizza Price :  ${{ $pizza->medium_pizza_price }}</p>
                            <p>Large Pizza Price  :  ${{ $pizza->large_pizza_price }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    a. list-group-item{
        font-size: 18px;
    }
    a.list-group-item:hover{
        background-color: red;
        color: #fff;
    }
    .card-header{
        background-color: red;
        color: #fff;
        font-size: 20px;
    }
    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
    }
</style>
@endsection
