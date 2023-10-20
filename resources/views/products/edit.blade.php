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
                        style="height: 300px"
                    >
                    <form method="POST" action="{{route('products.update', $product->id)}}" enctype="multipart/form-data">
                        @method("PUT")
                        @csrf
                        <div class="form-floating mb-3">
                            <input class="form-control" type="file" accept="image/*" name="profile" id="profile">
                            <label for="profile">Product image</label>
                            <span class="text-info">Choose if only you need to change the profile</span>
                            <span class="text-danger">
                                @error('profile')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="name" id="name" value="{{$product->name}}">
                            <label for="name">Product name</label>
                            <span class="text-danger">
                                @error('name')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="description" id="description" value="{{$product->description}}">
                            <label for="description">Product description</label>
                            <span class="text-danger">
                                @error('description')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" type="number" name="price" id="price" value="{{$product->price}}">
                            <label for="price">Product price</label>
                            <span class="text-danger">
                                @error('price')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" type="number" name="discount" id="discount" value="{{$product->discount}}">
                            <label for="discount">Product discount</label>
                            <span class="text-danger">
                                @error('discount')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" type="number" name="count" id="count" value="{{$product->count}}">
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
                        <div class="d-flex justify-content-end gap-4">
                            <a class="btn btn-danger" href="{{route('products.index')}}">Back</a>
                            <input type="submit" value="Update" class="btn btn-outline-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
