<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
@include('libraries.style')
</head>
<body>

    <div  class="container">
        <div class="row">
            <div class="col-md-12">

                <nav class="navbar navbar-expand-lg bg-body-tertiary">
                    <div class="container-fluid">
                      <a class="navbar-brand" href="#">Pos System</a>
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                          <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{url('/category')}}">Category</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{url('/brand')}}">Brand</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{url('/product')}}">Product</a>
                           </li>
                          <li class="nav-item">
                            <a class="nav-link " href="{{url('/sale')}}">Sales</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </nav>

            </div>
            <div>
              @yield('content')
            </div>

        </div>

     
    </div>
    @include('libraries.scripts')
</body>
</html>