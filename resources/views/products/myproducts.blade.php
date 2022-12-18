@extends('layouts.app')

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif


<table class="table table-bordered">
    <style>h5 {color: #ffffff;}th {color: #ffffff;}td {color: #ffffff;}</style>
    <tr>
        <th>Product Name</th>
        <th>Description</th>
        <th>Category</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Actions</th>
    </tr>
    
    @forelse ($products as $product)
    @if ($product->user->id == $id)  
    <tr>
        <td><a href="/showproducts/{{$product->id}}">{{$product->name}}</a></td>
        <td>{{$product->description}}</td>
        <td>{{$product->category}}</td>
        <td>{{$product->quantity}}</td>
        <td>{{$product->price}} €</td>
        <td>
        <form action="{{ route('myproducts.destroy',$product->id) }}" method="POST">
            <a class="btn btn-primary" href="{{ route('myproducts.edit',$product->id) }}">Edit</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        </td>
    @endif
    </tr>
    
    @empty
    <h5 class="text-center">No products Found!</h5>
    @endforelse
</table>


@endsection