@extends('layouts.app')

@section('content')
    <div class="">
            <div class="d-flex justify-content-center">
                    <img
                        src="{{asset('assets/products/'.$product->profile)}}"
                        class="img-thumbnail"
                    >
                <div class="">
                    <div class="card h-100">
                        <div class="card-body h-100 d-flex flex-column justify-content-center align-items-start gap-3">
                            <div class="fs-3">
                                {{$product->name}}
                            </div>
                            <div class="fs-5">
                                {{$product->description}}
                            </div>
                            <div class="gap-4">
                                <del class="fs-5">₹{{$product->price}}</del>
                                <span class="fs-4 badge bg-success">Price: ₹{{$product->price - $product->discount}}</span>
                            </div>
                            <div class="fs-5">
                                Discount: ₹{{$product->discount}}
                            </div>
                        </div>
                        <div class="d-flex justify-content-end gap-4 card-footer">
                            <a class="btn btn-danger" href="{{route('market.index')}}">Cancel</a>
                            <a class="btn btn-success" href="{{route('market.order', $product->id)}}">Order</a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
