@extends('layouts.app')

@section('title', 'Show Product')

@section('contents')
<h1>Detail Product</h1>
<hr>
<div>
    <div>
        <div>
            <label for="">Title</label>
            <div>
                {{ $product->title }}
            </div>
        </div>
        <div>
            <label for="">Price</label>
            <div>
                {{ $product->price }}
            </div>
        </div>
        <div>
            <label for="">Description</label>
            <div>
                {{ $product->description }}
            </div>
        </div>
        <div>
            <label for="">Product_code</label>
            <div>
                {{ $product->product_code }}
            </div>
        </div>
    </div>
</div>
@endsection