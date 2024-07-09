@extends('layout')

@section('content')

    {{-- <div class="container">

        <h3 align="center" class="mt-5">Sales</h3>

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="pos-container">
                    <h2>POS</h2>
                    <div class="form-group">
                        <label for="product-code">Product Code</label>
                        <input type="text" id="product-code" placeholder="barcode">
                        <label for="product-name">Product Name</label>
                        <input type="text" id="product-name" placeholder="barcode">
                        <label for="price">Price</label>
                        <input type="text" id="price" placeholder="price">
                        <label for="qty">Qty</label>
                        <input type="number" id="qty" value="1">
                        <label for="amount">Amount</label>
                        <input type="text" id="amount" placeholder="total_cost" readonly>
                        <button id="add-button">Add</button>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Remove</th>
                                <th>Product Code</th>
                                <th>Product Name</th>
                                <th>Unit price</th>
                                <th>Qty</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody id="product-list">
                            <!-- Product rows will go here -->
                        </tbody>
                    </table>
                    <div class="totals">
                        <label for="total">Total</label>
                        <input type="text" id="total" value="0" readonly>
                        <label for="pay">Pay</label>
                        <input type="text" id="pay">
                        <label for="balance">Balance</label>
                        <input type="text" id="balance" readonly>
                        <button id="update-invoice">Update Invoice</button>
                    </div>
                </div>
           
        </div>
    </div> --}}

    <div class="container">

        <h3 align="center" class="mt-5"><b>Product</b></h3>
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">

                <div class="container mt-5">
                    {{-- <form class="form-horizontal" id="frmInvoice"> --}}
                        <table class="table table-bordered">
                            <caption>Add Products</caption>
                            <thead>
                                <tr>
                                    <th>Product Code</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Amount</th>
                                    <th>Option</th>
                                </tr>
                            </thead>  
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" placeholder="Product ID" id="barcode" name="barcode" size="25px" required>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" placeholder="Product Name" id="pname" name="pname" size="50px" >
                                    </td>
                                    <td>  
                                        <input type="text" class="form-control pro_price" id="pro_price" name="pro_price" size="25px" placeholder="price">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control pro_price" id="qty" name="qty" min="1" value="1" size="10px" placeholder="qty" required>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="total_cost" name="total_cost" size="35px" placeholder="total_cost" name="total_cost">
                                    </td>
                                    <td>
                                        <button class="btn btn-success" type="button" onclick="addProduct()">Add</button>  
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Remove</th>
                                    <th>Product Code</th>
                                    <th>Product Name</th>
                                    <th>Unit Price</th>
                                    <th>Qty</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody id="product-list">
                                <!-- Product rows will go here -->
                            </tbody>
                        </table>

                        <div class="form-area">
                            <form method="POST" action="{{ route('sale.store') }}">
                                @csrf
                        <div class="row">
                            <div class="col-sm-4 offset-sm-8">
                                <div class="form-group">
                                    <label for="total">Total</label>
                                    <input type="text" class="form-control" id="total" name="total" value="0" >
                                </div>
                                <div class="form-group">
                                    <label for="pay">Pay</label>
                                    <input type="text" class="form-control" id="pay" name="pay" placeholder="Pay">
                                </div>
                                <div class="form-group">
                                    <label for="balance">Balance</label>
                                    <input type="text" class="form-control" id="balance" name="balance" placeholder="Balance" >
                                </div><br>
                                <input type="submit" class="btn btn-info" value="Update Invoice">
                                {{-- <button class="btn btn-primary" type="button" id="update-invoice">Update Invoice</button> --}}
                            </div>
                        </div>
                    </form>
                </div>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
               {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script> --}}
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEkGZ7LSLWgaPeJtw8MBM4i5wS0SBlsTjJctsnvFJG5VD26g5+THcLvsUuLtXPu6po2gVXmvfEdKwY4gRWlsQ==" crossorigin="anonymous"></script>


                <script>

                var version_id = null;
                var current_stock = 0;
                var product_no = 0;

                getProductcode();

                function getProductcode() {
                    $("#barcode").empty();
                    $("#barcode").keyup(function(e) {
                        var q = $("#barcode").val();
                        if ($("#barcode").val() === "") {
                            $.alert({
                                title: 'Error!',
                                content: 'Please Select Customer',
                                type: 'red',
                                autoClose: 'ok|2000'
                            });
                            return false;
                        }


                        $.ajax({
                        type: "POST",
                        url: "{{ route('search') }}",
                        datatype: "JSON",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            barcode: $("#barcode").val(),
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {

                                 
                            console.log(data);
                            $("#pname").val(data[0].product);
                            $("#pro_price").val(data[0].price);
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr, status, error);
                        }
                    });
                });
            }

                        function addproduct() {
                        var product = {
                        barcode: $("#barcode").val(),
                        pname: $("#pname").val(),
                        pro_price: $("#pro_price").val(),
                        qty: $("#qty").val(),
                        total_cost: $("#total_cost").val(),
                        button: '<button type="button" class="btn btn-warning btn-xs">delete</button>'
                    };
                    addRow(product);
                    $("#frmInvoice")[0].reset();
                }

                var total = 0;
                var discount = 0;
                var grosstotal = 0;
                var qtye = 0;
                var barcode = 0;

                function addRow(product) {
                console.log(product.total_cost);
                var $tableB = $("#product_list tbody");
                var $row = $("<tr><td><button type='button' name='record' class='btn btn-warning btn-xs' name='record' onclick='deleterow(this)'>delete</button></td><td>" + product.barcode + "</td><td class='price'>" + product.pname + "</td><td>" + product.pro_price + "</td><td>" + product.qty + "</td><td>" + product.total_cost + "</td></tr>");
                $row.data("barcode", product.product_code);
                $row.data("pname", product.product_name);
                $row.data("pro_price", product.price);
                $row.data("qty", product.qty);
                $row.data("total_cost", product.total_cost);
                total += Number(product.total_cost);
                $('#total').val(total);
                console.log(product.total_cost);
                qtye += Number(product.qty);

                $row.find('.deleterow').click(function(event) {
                    deleteRow($(event.currentTarget).parent('tr'));
                });

                $tableB.append($row);
            }


                </script>
                                      
@endsection

{{-- 
@push('js')
<script>

</script>

@endpush --}}



@push('css')
    <style>
      body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 20px;
}

.table th, .table td {
    vertical-align: middle !important;
}

.btn-success {
    width: 100%;
}

.container {
    max-width: 1200px;
}

.row {
    margin-top: 20px;
}

#frmInvoice {
    margin-top: 20px;
}


    </style>
@endpush
