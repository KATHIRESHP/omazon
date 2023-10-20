@extends('layouts.app')

@section('content')
    <div>
        <div class="d-flex flex-column align-items-center justify-content-center">
            <div class="card col-6 px-5 bg-dark text-light">
                <div class="card-title h2 p-4">Product</div>
                <div class="card-body">
                    <form method="POST" action="{{route('products.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <input class="form-control" type="file" accept="image/*" name="profile" id="profile">
                            <label for="profile">Product image</label>
                            <span class="text-danger">
                                @error('profile')
                                    {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="name" id="name">
                            <label for="name">Product name</label>
                            <span class="text-danger">
                                @error('name')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="description" id="description">
                            <label for="description">Product description</label>
                            <span class="text-danger">
                                @error('description')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" type="number" name="price" id="price">
                            <label for="price">Product price</label>
                            <span class="text-danger">
                                @error('price')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" type="number" name="discount" id="discount">
                            <label for="discount">Product discount</label>
                            <span class="text-danger">
                                @error('discount')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" type="number" name="count" id="count">
                            <label for="count">Available count</label>
                            <span class="text-danger">
                                @error('count')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="d-flex justify-content-end gap-4">
                            <a class="btn btn-danger" href="{{route('products.index')}}">Back</a>
                            <input type="submit" value="Add" class="btn btn-outline-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
