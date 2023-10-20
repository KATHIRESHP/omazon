@extends('layouts.app')

@section('content')
    <div>
        <div>
            <div class="d-flex flex-column justify-content-center">
                @role('admin|seller')
                <div class="d-flex justify-content-end">
                    <a class="btn btn-primary" href="{{route('products.create')}}">
                        Add a product
                    </a>
                </div>
                @endrole
                <div class="row gap-5 mt-5 d-flex justify-content-center">
                    @if($products->isEmpty())
                        <div>
                            You have no releases previous!
                        </div>
                    @else
                        @foreach($products as $product)
                            <div class="card col-9 col-md-5 col-lg-4 h-75 col-xl-3">
                                <div class="card-body d-flex flex-column">
                                    <a href="{{route('products.show', $product->id)}}">
                                        <img
                                            src="{{asset('assets/products/'. $product->profile)}}"
                                            height="100"
                                            width="100"
                                            alt="Post"
                                            class="rounded"
                                            title={{$product->name}}
                                        style=" height: 300px; width: 100%; object-fit: cover;"
                                        >
                                    </a>
                                    <div class="fs-4 font-monospace">
                                        {{$product->name}}
                                    </div>
                                    <span class="card-footer d-flex justify-content-between">
                                        <div class="d-flex justify-content-start flex-column w-100">
                                           <div class="d-flex gap-4 w-100">
                                                <del class="fs-6">₹{{$product->price}}</del>
                                                <span class="fs-5 badge bg-success">₹{{$product->price - $product->discount}}</span>
                                           </div>
                                            <span class="fs-5 w-100">Discount:{{$product->discount}}</span>
                                        </div>
                                        <div class="d-flex justify-content-end w-100">
                                            <form action="{{route('products.destroy', $product->id)}} " method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn text-danger fs-4" type="submit">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </form>
                                                <a href="{{route('products.edit', $product->id)}}" class="btn text-primary">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                        </div>
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
