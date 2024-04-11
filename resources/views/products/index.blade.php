@extends('layouts.app')

@section('title', 'Home Product List')

@section('contents')
<div>
    <h1>Home product List</h1>
    <a href="{{ url('admin/products/create') }}">Add product</a>
    <hr>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Price</th>
                <th>Product Code</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($product->count() > 0)
            @foreach($product as $rs)
            <tr>
                <th>
                    {{ $loop->iteration }}
                </th>
                <td>
                    {{ $rs->title }}
                </td>
                <td>
                    {{ $rs->price }}
                </td>
                <td>
                    {{ $rs->product_code }}
                </td>
                <td>
                    {{ $rs->description }}
                </td>
                <td>
                    <div>
                        <a href="{{ route('admin/products/show', $rs->id) }}">Detail</a>
                        <a href="{{ route('admin/products/edit', $rs->id) }}">Edit</a>
                        <form action="{{ route('admin/products/destroy', $rs->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button>Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td>Product not found</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection