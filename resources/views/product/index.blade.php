@extends('layout')

@section('content')

    <div class="container">

        <h3 align="center" class="mt-5"><b>Product</b></h3>
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">

            <div class="form-area">
                <form method="POST" action="{{ route('product.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>product Name</label>
                            <input type="text" class="form-control" name="product">
                        </div>
                        <div class="col-md-6">
                            <label>Category</label>
                            <select class="form-control" name="cat_id" id="cat_id">
                               @foreach($categories as $id=>$name)
                               <option value="{{$id}}">{{$name}}</option>
                               @endforeach
                            </select>                                              
                    </div>  
                    
                    <div class="col-md-6">
                        <label>Brand</label>
                        <select class="form-control" name="brand_id" id="brand_id">
                           @foreach($brands as $id=>$name)
                           <option value="{{$id}}">{{$name}}</option>
                           @endforeach
                        </select>                                            
                </div>  
                
                
               
                    <div class="col-md-6">
                        <label>Price</label>
                        <input type="text" class="form-control" name="price">
                    </div>
                  </div>

                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="submit" class="btn btn-info" value="Register">
                        </div>

                    </div>
                </form>
            </div>
                <table class="table mt-5">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">product Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
    
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ( $products as $key => $product )
                        <tr>
                            <td scope="col">{{ ++$key }}</td>
                            <td scope="col">{{ $product->product }}</td>
                            <td scope="col">{{ $product->category->category }}</td>
                            <td scope="col">{{ $product->brand->brand }}</td>
                            <td scope="col">{{ $product->price}}</td>
                            
                            <td scope="col">

                            <a href="{{  route('product.edit', $product->id) }}">
                            <button class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                            </button>
                            </a>
                            
                            <form action="{{ route('product.destroy', $product->id) }}" method="POST" style ="display:inline">
                             @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                            </td>

                          </tr>

                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>

@endsection

@push('css')
    <style>
        .form-area{
            padding: 20px;
            margin-top: 20px;
              background-color:#8477f3;
        }

        .bi-trash-fill{
            color:red;
            font-size: 18px;
        }

        .bi-pencil{ 
            color:green;
            font-size: 18px;
            margin-left: 20px;
        }
    </style>
@endpush