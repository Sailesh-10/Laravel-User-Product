@extends('layouts.app')
@section('content')

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">ADD PRODUCT!</h1>
                    </div>
                    <form action="{{route('product.store')}}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="name" name="name"
                                    placeholder="Name">
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="col-sm-6">
                                <input type="textarea" class="form-control form-control-user" id="description"
                                    name="description" placeholder="description">
                                @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control form-control-user" id="price" name="price"
                                placeholder="price">
                            @if ($errors->has('price'))
                            <span class="text-danger">{{ $errors->first('price') }}</span>
                            @endif
                        </div>
                        <div class="ml-3 mt-3 mb-3 ">
                            <p>Type</p>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="top seller" id="type" name="type">
                                <label class="form-check-label" for="type">
                                    Top Seller
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="featured" id="type" name="type">
                                <label class="form-check-label" for="type">
                                    Featured
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="number" class="form-control form-control-user" id="weight" name="weight"
                                    placeholder="weight">
                                @if ($errors->has('weight'))
                                <span class="text-danger">{{ $errors->first('weight') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="number" class="form-control form-control-user" id="stock" name="stock"
                                    placeholder="stock">
                                @if ($errors->has('stock'))
                                <span class="text-danger">{{ $errors->first('stock') }}</span>
                                @endif
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary btn-facebook btn-user btn-block ">Add
                                Product</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection