@extends('layouts.app')

@section('title', 'Edit Product')

@section('contents')
<div>
    <h1>Edit product</h1>
    <hr>
    <div>
        <div>
            <form action="{{ route('admin/products/update', $product->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div>
                    <label for="">Title</label>
                    <input type="text" name="title" id="title" value="{{ $product->title }}">
                </div>
                <div>
                    <label for="">Price</label>
                    <input type="text" name="price" id="price" value="{{ $product->price }}">
                </div>
                <div>
                    <label for="">Product Code</label>
                    <input type="text" name="product_code" id="product_code" value="{{ $product->product_code }}">
                </div>
                <div>
                    <label for="">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10" >{{ $product->description }}</textarea>
                </div>
                <button type="submit">update product</button>
            </form>
        </div>
    </div>
</div>
@endsection