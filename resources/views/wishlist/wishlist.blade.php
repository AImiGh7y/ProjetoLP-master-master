@extends('layouts.app')

@section('content')

<style> h5, td, h3, tr {color: #ffffff;}</style>

<style>
    body {background: #212534;}*{ box-sizing:border-box; -moz-box-sizing:border-box; } #wrap{ width: 90%; max-width: 1100px; margin: 50px auto; } .columns_2 figure{ width:49%; margin-right:1%; } .columns_2 figure:nth-child(2){ margin-right: 0; } .columns_3 figure{ width:32%; margin-right:1%; } .columns_3 figure:nth-child(3){ margin-right: 0; } .columns_4 figure{ width:24%; margin-right:1%; } .columns_4 figure:nth-child(4){ margin-right: 0; } .columns_5 figure{ width:19%; margin-right:1%; } .columns_5 figure:nth-child(5){ margin-right: 0; } #columns figure:hover{ -webkit-transform: scale(1.1); -moz-transform:scale(1.1); transform: scale(1.1); } #columns:hover figure:not(:hover) { opacity: 0.4; } div#columns figure { display: inline-block; background: #FEFEFE; border: 2px solid #FAFAFA; box-shadow: 0 1px 2px rgba(34, 25, 25, 0.4); margin: 0 0px 15px; -webkit-column-break-inside: avoid; -moz-column-break-inside: avoid; column-break-inside: avoid; padding: 15px; padding-bottom: 5px; background: -webkit-linear-gradient(45deg, #FFF, #F9F9F9); opacity: 1; -webkit-transition: all .3s ease; -moz-transition: all .3s ease; -o-transition: all .3s ease; transition: all .3s ease; } div#columns figure img { width: 100%; border-bottom: 1px solid #ccc; padding-bottom: 15px; margin-bottom: 5px; } div#columns figure figcaption { font-size: .9rem; color: #444; line-height: 1.5; height:60px; font-weight:600; text-overflow:ellipsis; } a.button{ padding:10px; background:salmon; margin:10px; display:block; text-align:center; color:#fff; transition:all 1s linear; text-decoration:none; text-shadow:1px 1px 3px rgba(0,0,0,0.3); border-radius:3px; border-bottom:3px solid #ff6536; box-shadow:1px 1px 3px rgba(0,0,0,0.3); } a.button:hover{ background:#ff6536; border-bottom:3px solid salmon; color:#f1f2f3; } @media screen and (max-width: 960px) { #columns figure { width: 24%; } } @media screen and (max-width: 767px) { #columns figure { width:32%;} } @media screen and (max-width: 600px) { #columns figure { width: 49%;} } @media screen and (max-width: 500px) { #columns figure { width: 100%;} }
</style>
<div hidden>{{$i=0}}</div>
<div id="wrap">
    <div id="columns" class="columns_4">  
    @foreach ($items as $item)
    @if(Auth::id() == $item->user->id)
     <div hidden>{{$i=1}}</div>
    <figure>  
        <label class="item">
            <div hidden> {{$j=0}}</div>
             @foreach($images as $image)
             @if($image->product_id == $item->product->id)
             <div hidden>{{$j=1}}</div>
             <div hidden>{{$image2 = $image}}</div>
             @endif
             @endforeach
                @if($j == 0)
                    <img src="{{$item->product['product_url']}}" alt="picture">
                @else
                    <img  src="/images/{{$image2->image}}" alt="picture">
                @endif
            <figcaption>{{ $item->product->name}}</figcaption>
            <span>{{ $item->product->price}}€</span>
            <form action="{{ route('wishlistproduct.destroy', $item->id) }}" method="POST">
               <a class="button" href="/showproducts/{{$item->product_id}}">Select</a>
               @csrf
               @method('DELETE')
               <button  type="submit" class="btn btn-danger">Delete</button>
            </form>
        </label>
       </figure>
    @endif
    @endforeach
    @if($i == 0)
    <h5 class="text-center">Your wishlist is empty!</h5>
    @endif
    
</div>


@endsection
