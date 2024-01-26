<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Datail Products</title>
        <style>
            * {
                font-family: "Quicksand";
                margin: 0;
                padding: 0;
            }

            header {
                padding: 20px;
            }

            header h1 {
                text-align: center;
            }

            .container {
                width: 1500px;
                margin-left: auto;
                margin-right: auto;
            }

            table{
                margin-left: auto;
                margin-right: auto;
            }

            td {
                padding: 10px;
            }

            .desc-product {
                text-align: justify;
            }

            .btn {
                margin-top: 20px;
                display: flex;
                justify-content: end;
                align-items: center;
            }

            .btn_action {
                width: 100px;
                padding: 10px;
                border: none;
                border-radius: 10px;
                cursor: pointer;
                margin-right: 20px;
                transition: all 0.3s ease-in-out 0s;
            }

            .edit:hover {
                background-color: lightskyblue;
                font-weight: bold;
            }

            .delete:hover {
                background-color: lightcoral;
                font-weight: bold;
            }

            .statusActive {
                color: green;
                font-weight: bold;
            }

            .statusInactive {
                color: red;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <header>
            <h1>Detail Products</h1>
        </header>
        <div class="container">
            <table border="1">
                <tr>
                    <td>Product Name</td>
                    <td>:</td>
                    <td>{{$product->nama_product}}</td>
                </tr>

                <tr>
                    <td>Product Description</td>
                    <td>:</td>
                    <td class="desc-product">
                        {{$product->description_product}}
                    </td>
                </tr>

                <tr>
                    <td>Product Stock Amount</td>
                    <td>:</td>
                    <td>{{$product->stock_amount}}</td>
                </tr>

                <tr>
                    <td>Id Supplier</td>
                    <td>:</td>
                    <td>{{$product->id_supplier}}</td>
                </tr>

                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td>
                        @if($product->status == "active")
                        <div class="statusActive">Active</div>
                        @endif @if($product->status == "inactive")
                        <div class="statusInactive">Inactive</div>
                        @endif
                    </td>
                </tr>
            </table>

            <div class="btn">
                <a href="{{url('/editprod/'.$product->id_product)}}">
                    <button class="btn_action edit">Edit</button>
                </a>
                <form
                    action="{{url('/deleteproduct/'.$product->id_product)}}"
                    method="POST"
                >
                    @method('DELETE') @csrf
                    <button class="btn_action delete">Delete</button>
                </form>
            </div>
        </div>
    </body>
</html>