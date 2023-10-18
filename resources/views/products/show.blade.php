@extends('layouts.app')

@section('content')
    <div>
        <div class="d-flex justify-content-center">
            <div class="card col-6">
                <div class="card-body">
                    <img
                        height="100",
                        width="100"
                        src="{{asset('assets/products/'.$product->profile)}}"
                        class="card-img-top"
                        style="height: 500px"
                    >
                    <form>
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="name" id="name" value="{{$product->name}}" readonly>
                            <label for="name">Product name</label>
                            <span class="text-danger">
                                @error('name')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="description" id="description" value="{{$product->description}}" readonly>
                            <label for="description">Product description</label>
                            <span class="text-danger">
                                @error('description')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" type="number" name="count" id="count" value="{{$product->count}}" readonly>
                            <label for="count">Available count</label>
                            <span class="text-danger">
                                @error('count')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <div>Total count ordered: {{$product->sold_count}}</div>
                        </div>
                        <div class="mb-3 card">
                            <div class="card-title m-4 h4">Seller details</div>
                            <div class="card-body">
                                <div>Name: {{$product->seller->id}}</div>
                                <div>Name: {{$product->seller->name}}</div>
                                <div>Name: {{$product->seller->email}}</div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end gap-4">
                            <a class="btn btn-danger" href="{{route('products.index')}}">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
