@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Menu') }}</div>
                    <div class="card-body">
                       <form action="{{ route('frontpage') }}" method="GET">
                            <a href="/" class="list-group-item list-group-item-action">ALL</a>
                            <input type="submit" name="category" value="vegetarian" class="list-group-item list-group-item-action">
                            <input type="submit" name="category" value="nonvegetarian" class="list-group-item list-group-item-action">
                            <input type="submit" name="category" value="traditional" class="list-group-item list-group-item-action">
                        </form>

                    </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} ({{ count($pizzas) }}) Pizzaz</div>
                <div class="card-body">
                    <div class=" row">
                        @forelse ($pizzas as $pizza)
                        <div class="col-md-4 text-center" style="border: 1px solid #ccc;">
                            <img width="200px" class="img-thumbnail" src="{{asset('images/pizza/'.$pizza->image)}}">
                            <p>{{ $pizza->name }}</p>
                            <p>{{ $pizza->description }}</p>
                            <a href="{{ route('pizzas.show',$pizza->id) }}">
                                <button class="btn btn-danger mb-3">Order Now</button>
                            </a>
                        </div>
                        @empty
                            <p>No Pizzas To Show</p>
                        @endforelse

                     </div>
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
</style>
@endsection
