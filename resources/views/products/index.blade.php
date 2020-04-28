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

    @foreach ($products as $product)
    <div class="card m-2" style="max-width: 540px">
        <div class="row no-gutters">
            <div class="col-sm-4">
                <a href="{{ route('products.show', $product->id) }}">
                    <img class="card-img-top" src="{{ $product->imageUrl() }}" alt="Product image">
                </a>
            </div>
            <div class="col-sm-8">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('products.show', $product->id) }}">{{ Str::limit($product->name, 20, '...') }}</a></h5>
                    <p class="card-text">&yen;{{ $product->price }}</p>
                    <p class="card-text"><small class="text-muted">{{ Str::limit($product->description, 40, '...') }}</small></p>
                    <p class="card-text"><a href="javascript:alert('カートは未実装です');" class="btn btn-primary">カートに入れる</a></p>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    {!! $products->appends(Request::except('page'))->links() !!}

@endsection
