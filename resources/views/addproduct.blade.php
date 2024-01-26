<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Add Products</title>
        <style>
            * {
                font-family: "Quicksand";
                margin: 0;
                padding: 0;
            }
            header {
                text-align: center;
                padding: 10px;
            }

            .container {
                width: 100%;
                margin-left: auto;
                margin-right: auto;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-top: 20px;
            }

            form {
                text-align: center;
            }

            td {
                padding: 10px;
                text-align: start;
            }

            .save {
                border: none;
                border-radius: 10px;
                padding: 10px;
                cursor: pointer;
                transition: all 0.3s ease-in-out 0s;
                background-color: green;
                color: white;
                margin-left: auto;
                margin-right: auto;
                margin-top: 20px;
            }

            .save:hover {
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <header>
            <h1>Add Products</h1>
        </header>

        <div class="container">
            <form action="{{ url('/saveproduct') }}" method="POST">
                @csrf
                <table>
                    <tr>
                        <td>Product Name</td>
                        <td>:</td>
                        <td>
                            <input
                                type="text"
                                name="nama_product"
                                id="nama_product"
                                style="width: 400px"
                                required
                            />
                        </td>
                    </tr>

                    <tr>
                        <td>Product Description</td>
                        <td>:</td>
                        <td>
                            <textarea
                                name="description_product"
                                id="description_product"
                                cols="57"
                                rows="10"
                                required
                            >
                            </textarea>
                        </td>
                    </tr>

                    <tr>
                        <td>Product Stock Amount</td>
                        <td>:</td>
                        <td>
                            <input
                                type="number"
                                name="stock_amount"
                                id="stock_amount"
                                style="width: 400px"
                                required
                            />
                        </td>
                    </tr>

                    <tr>
                        <td>Id Supplier</td>
                        <td>:</td>
                        <td>
                            <input
                                type="number"
                                name="id_supplier"
                                id="id_supplier"
                                style="width: 400px"
                                required
                            />
                        </td>
                    </tr>

                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td>
                            <input
                                type="text"
                                name="status"
                                id="status"
                                style="width: 400px"
                                required
                            />
                        </td>
                    </tr>
                </table>

                <button class="save" type="submit">Save Product</button>
            </form>
        </div>
    </body>
</html>
