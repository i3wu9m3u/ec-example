@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Products</h2>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
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

    {!! $products->links() !!}

@endsection
