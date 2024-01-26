<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Product Stock</title>
        <style>
            * {
                font-family: "Quicksand";
                margin: 0;
                padding: 0;
            }

            .header {
                width: 100%;
                text-align: center;
            }

            .header h1 {
                padding: 20px;
            }

            .container {
                width: 1500px;
                margin-left: auto;
                margin-right: auto;
            }

            .tbl-header {
                background-color: antiquewhite;
            }

            .no {
                text-align: center;
                padding: 10px;
            }

            .name-product {
                padding: 10px;
                text-align: justify;
            }

            .desc-product {
                padding: 10px;
                text-align: justify;
            }
            .amount {
                text-align: center;
                padding: 10px;
            }

            .status {
                padding: 10px;
            }

            .statusActive {
                background-color: lightgreen;
                padding: 10px;
                border-radius: 10px;
                font-weight: bold;
                text-align: center;
            }
            .statusInactive {
                background-color: lightcoral;
                padding: 10px;
                border-radius: 10px;
                text-align: center;
                font-weight: bold;
            }

            .btn-detail {
                width: 100px;
                text-align: center;
            }

            .detail-button {
                border: none;
                width: 60px;
                padding: 10px;
                cursor: pointer;
                background-color: lightskyblue;
                border-radius: 10px;
                transition: all 0.3s ease-in-out 0s;
            }
            .detail-button:hover {
                font-weight: bold;
                width: 75px;
            }

            .add-product {
                margin-bottom: 20px;
                text-align: end;
            }

            .add-product button {
                width: 120px;
                padding: 10px;
                border: none;
                border-radius: 10px;
                cursor: pointer;
                transition: all 0.3s ease-in-out 0s;
            }

            .add-product button:hover {
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <div class="header">
            <h1>Product</h1>
        </div>

        <div class="container">
            <div class="add-product">
                <a href="{{ url('/addproduct') }}">
                    <button>+ Add Product</button>
                </a>
            </div>
            <table border="1">
                <thead>
                    <tr class="tbl-header">
                        <th>No</th>
                        <th>Product Name</th>
                        <th>Product Description</th>
                        <th>Stock Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($product as $item)
                    <tr>
                        <td class="no">{{ $item->id_product }}</td>
                        <td class="name-product">{{ $item->nama_product }}</td>
                        <td class="desc-product">
                            {{ $item->description_product }}
                        </td>
                        <td class="amount">{{ $item->stock_amount }}</td>
                        <td class="status">
                            @if($item->status == "active")
                            <div class="statusActive">Active</div>
                            @endif @if($item->status == "inactive")
                            <div class="statusInactive">Inactive</div>
                            @endif
                        </td>
                        <td class="btn-detail">
                            <a href="{{url('/product/'.$item->id_product)}}">
                                <button class="detail-button">Detail</button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <hr style="margin-top: 20px" />
        <p style="text-align: center">&copy; {{ date("Y") }} Candra</p>
    </body>
</html>
