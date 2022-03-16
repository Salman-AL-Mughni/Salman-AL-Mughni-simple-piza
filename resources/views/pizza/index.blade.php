@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
            <div class="card">
                <div class="card-header">{{ __('Menu') }}</div>
                <div class="card-body">
                    <ul class="list-group">
                        <a href="{{ route('pizza.index') }}" class="list-group-item list-group-item-action">View</a>
                        <a href="{{ route('pizza.create') }}" class="list-group-item list-group-item-action">Create</a>
                        <a href="{{ route('order.index') }}" class="list-group-item list-group-item-action">User Order</a>
                    </ul>
                </div>
            </div>
        </div>
        <div class=" col-md-10">
            <div class="card">
                <div class="card-header">AlL Pizza
                    <a href="{{ route('pizza.create') }}" class="btn btn-primary ml-auto" style="margin-left: 830px"><i class="fa fa-plus"></i> Create Pizza</a>
                </div>
                <div class=" card-body">
                    @if (session ('message'))
                        <div class="alert alert-success" role="alert">
                             {{ session('message') }}
                        </div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Category</th>
                            <th scope="col">Small Price</th>
                            <th scope="col">Medium Price</th>
                            <th scope="col">Large Price</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Updated at</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if (count($pizzas)>0)
                                    @foreach ( $pizzas as $key =>$pizza )
                                        <tr>
                                            <th scope="row">{{ $key+1 }}</th>
                                            <td><img width="80" height="90px" src="{{asset('images/pizza/'.$pizza->image)}}"></td>
                                            <td>{{ $pizza->name }}</td>
                                            <td>{{ $pizza->description  }}</td>
                                            <td>{{ $pizza->category }}</td>
                                            <td>{{ $pizza->small_pizza_price }}</td>
                                            <td>{{ $pizza->medium_pizza_price }}</td>
                                            <td>{{ $pizza->large_pizza_price }}</td>
                                            <td>{{ $pizza->created_at }}</td>
                                            <td>{{ $pizza->updated_at }}</td>
                                            <td><a href="{{ route('pizza.edit', [$pizza->id]) }}" class="btn btn-secondary"><i class="fas fa-edit"></i></a></td>
                                            <td>
                                                <form action="{{ route('pizza.destroy', $pizza->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger">
                                                        <i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                @endforeach
                             @else
                                        <p>No Pizza To Show</p>
                          @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4">
                                    <div class="float-right">
                                         {!! $pizzas->links() !!}
                                    </div>
                                </td>
                            </tr>
                    </tfoot>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
