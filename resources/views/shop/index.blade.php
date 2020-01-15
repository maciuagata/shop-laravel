@extends('layouts.master')

<style>
.text-center {
    font-size:20px;
    margin-top: 20px;
}
</style>

@section('title')
   Agata's shop
@endsection
    
@section('content')
    @foreach($products->chunk(3) as $productChunk)
    <div class="row">
        @foreach($productChunk as $product)
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="{{ $product->imagePath}}" alt="..." class="img-responsive">
                <div class="caption">
                    <h3>{{ $product->title}}</h3>
                    <p class="description">{{ $product->description}}</p>
                    <div class="clearfix">
                        <div class="pull-left price">€{{ $product->price}}</div>
                        <a href="{{ route('product.addToCart', ['id' => $product->id]) }}" class="btn btn-success pull-right" role="button">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endforeach
    <footer class="container">
    <div class="text-center">© Copyright 2020 Agata Maciulevič</div>
    <p class ="text-center">Contact information: <a href="mailto:maciulewiczagata@gmail.com">maciulewiczagata@gmail.com</a></p>
    </footer>

@endsection