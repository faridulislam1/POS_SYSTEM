@extends('layout')

@section('content')

    <div class="container">

        <h3 align="center" class="mt-5"><b>Brand</b></h3>
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">

            <div class="form-area">
                <form method="POST" action="{{ route('brand.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>brand Name</label>
                            <input type="text" class="form-control" name="brand">
                        </div>
                        <div class="col-md-6">
                            <label>status</label>
                            <select class="form-control" name="status">
                                <option selected>Select menu</option>
                                <option value="1">True </option>
                                <option  value="2">False</option>
                            </select>                                              </div>
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
                        <th scope="col">brand </th>
                        <th scope="col">status</th>
                        <th scope="col">Action</th>
    
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ( $brands as $key => $brand )
                        <tr>
                            <td scope="col">{{ ++$key }}</td>
                            <td scope="col">{{ $brand->brand }}</td>
                            <td scope="col">
                                @if($brand->status==1)
                                true
                                @else
                                false
                                @endif
                      
                            <td scope="col">

                            <a href="{{  route('brand.edit', $brand->id) }}">
                            <button class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                            </button>
                            </a>
                            
                            <form action="{{ route('brand.destroy', $brand->id) }}" method="POST" style ="display:inline">
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
              background-color:#bbf09d;
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