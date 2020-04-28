@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-2">
            <div class="pull-left">
                <h2>Products</h2>
            </div>
        </div>
        <div class="col-md-10">
            <form action="{{ route('products.index') }}" method="GET">
                <input type="text" name="keyword" placeholder="Search keyword" value="{{ $keyword }}">
                <input type="number" name="price" placeholder="Max price" value="{{ $price }}">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
    </div>

    <div class="row">
        <table class="table table-bordered col-md-12">
            <tr>
                <th>Name</th>
                <th>Price</th>
                <!-- th width="280px">Action</th -->
            </tr>
            @foreach ($products as $product)
            <tr>
                <td><a href="{{ route('products.show', $product->id) }}">{{ Str::limit($product->name, 40, '...') }}</a></td>
                <td>{{ $product->price }}</td>
            </tr>
            @endforeach
        </table>
    </div>

    {!! $products->appends(Request::except('page'))->links() !!}

@endsection
