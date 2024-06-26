<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopFusion</title>
    <link rel="icon" type="image/x-icon" href="{{asset('assets/img/apple-icon.png')}}" />
    <style>
        body{
            background-color: #F6F6F6; 
            margin: 0;
            padding: 0;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            padding: 0;
        }
        p{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 100%;
            margin-right: auto;
            margin-left: auto;
        }
        .brand-section{
           background-color: #0d1033;
           padding: 10px 40px;
        }
        .logo{
            width: 50%;
        }

        .row{
            display: flex;
            flex-wrap: wrap;
            width: 100%;
        }
        
        .col-6{
            width: 50%;
            flex: 0 0 auto;
        }
        .text-white{
            color: #fff;
        }
        .company-details{
            float: right;
            text-align: right;
        }
        .body-section{
            padding: 16px;
            border: 1px solid gray;
        }
        .heading{
            font-size: 20px;
            margin-bottom: 08px;
        }
        .sub-heading{
            color: #262626;
            margin-bottom: 05px;
        }
        table{
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }
        table thead tr{
            border: 1px solid #111;
            background-color: #f2f2f2;
        }
        table td {
            vertical-align: middle !important;
            text-align: center;
        }
        table th, table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }
        .table-bordered{
            box-shadow: 0px 0px 5px 0.5px gray;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .text-right{
            text-align: end;
        }
        .w-20{
            width: 20%;
        }
        .float-right{
            float: right;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="brand-section">
            <div class="row">
                <div class="col-6">
                    <h1 class="text-white">ShopFusion</h1>
                </div>
                <div class="col-6">
                    
                </div>
            </div>
        </div>

        <div class="body-section">
            <div class="row">
                <div class="col-6">
                    <h2 class="heading">Invoice No.: {{ $order->id }}</h2>
                    <p class="sub-heading">Date: @php echo date("d M Y"); @endphp </p>
                    <p class="sub-heading">Email Address: {{ $order->user->email }} </p>
                </div>
                <div class="col-6">
                    <p class="sub-heading">Name: {{ $order->name }} </p>
                    <p class="sub-heading">Address: {{ $order->address }} </p>
                    <p class="sub-heading">Phone Number: {{ $order->phone }} </p>
                </div>
            </div>
        </div>

        <div class="body-section">
            <h3 class="heading">Ordered Items</h3>
            <br>
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th class="w-20">Price</th>
                        <th class="w-20">Quantity</th>
                        <th class="w-20">Grandtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $order->product->title }}</td>
                        <td>{{ $order->product->price }}</td>
                        <td>1</td>
                        <td>{{ $order->product->price }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">Sub Total</td>
                        <td>{{ $order->product->price }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">Tax Total 10%</td>
                        <td>
                            @php
                                $tax = $order->product->price * 0.1;
                                echo $tax;
                                $total = $tax + $order->product->price;
                            @endphp
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">Grand Total</td>
                        <td>
                            @php
                                echo $total;
                            @endphp
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right">
                            {{ $order->payment_status }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <br>
        </div>     
    </div>      

</body>
</html>