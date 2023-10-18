@extends('layouts.app')

@section('content')
    <div>
        <div>
            <div>
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <div class="d-flex justify-content-end w-100">
                        <a class="btn btn-primary" href="{{route('products.create')}}">
                            Add a product
                        </a>
                    </div>
                    @if($products->isEmpty())
                        <div>
                            You have no releases previous!
                        </div>
                    @else
                        @foreach($products as $product)
                            <div class="card col-9 col-md-5 col-lg-4 h-75 col-xl-3">
                                <div class="card-title m-1">
                                    {{$product->name}}
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <img
                                        src="{{asset('assets/products/'. $product->profile)}}"
                                        height="100"
                                        width="100"
                                        alt="Post"
                                        class="rounded"
                                        title={{$product->name}}
                                        style=" height: 300px; width: 100%; object-fit: cover;"
                                    >
                                    <span class="card-footer d-flex justify-content-between">
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
                                                <a href="{{route('products.show', $product->id)}}" class="btn text-primary">
                                                    <i class="bi bi-arrows-angle-expand"></i>
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
