@extends('layout')

@section('content')

    <div class="container">

        <h3 align="center" class="mt-5"> Update category</h3>

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">

            <div class="form-area">
                <form method="POST" action="{{ route('category.update', $category->id) }}">
                {!! csrf_field() !!}
                  @method("PATCH")
                    <div class="row">
                        <div class="col-md-6">
                            <label>Category Name</label>
                            <input type="text" class="form-control" name="category" value="{{ $category->category }}">
                        </div>
                        <div class="col-md-6">
                            <label>status</label>
                            <select  class="form-control" name="status" >

                            <option selected>Select menu</option>
                            <option value="1">True </option>
                            <option  value="2">False</option>
                        </select>
                        
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="submit" class="btn btn-primary" value="Update">
                        </div>

                    </div>
                </form>
            </div>

            </div>
        </div>
    </div>

@endsection


@push('css')
    <style>
        .form-area{
            padding: 20px;
            margin-top: 20px;
            background-color:#b3e5fc;
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