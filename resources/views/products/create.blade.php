@extends('layouts.app')

@section('title', 'Create Product')

@section('contents')
<div>
    <h1>Add product</h1>
    <hr>
    <div>
        <div>
            <form action="{{ route('admin/products/store') }}" method="POST">
                @csrf
                <div>
                    <label for="">Title</label>
                    <input type="text" name="title" id="title">
                </div>
                <div>
                    <label for="">Price</label>
                    <input type="text" name="price" id="price">
                </div>
                <div>
                    <label for="">Product Code</label>
                    <input type="text" name="product_code" id="product_code">
                </div>
                <div>
                    <label for="">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10"></textarea>
                </div>
                <button type="submit">create product</button>
            </form>
        </div>
    </div>
</div>
@endsection