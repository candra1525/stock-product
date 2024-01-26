<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class ProductApiController extends Controller
{
    // Show All Product
    public function index()
    {
        try{
            $product = Product::all();
            return response()->json([
                'code' => Response::HTTP_OK,
                'message'=> 'Product data displays successfully',
            ]);
        }
        catch(Exception $e){
            return response()->json([
                'code'=> $e->getMessage(),
            ]);
        }
    }

    // Insert Product
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nama_product' => 'required|string',
            'description_product' => 'required|string',
            'stock_amount' => 'required|integer',,
            'id_supplier' => 'required|integer',
            'status' => 'required|string',
        ]);

        if($validate->fails()){
            return response()->json([
                'message'=> $validate->errors()->first(),
            ]);
        }
        else
        {
            $validated = $validate->validated();
            try{
                $insertProduct = Product::create($validated);
                return response()->json([
                    'code'=> Response::HTTP_CREATED,
                    'message'=> 'Product data added successfully',
                    'data'=> $insertProduct
                ]);
            }
            catch(Exception $e){
                return response()->json([
                    'message'=> $e->getMessage()
                ]);
            }
        }
    }

    // Show Current Product
    public function show(string $id)
    {
        try{
            $findProduct = Product::findOrFail($id);
            return response()->json([
                'code'=> Response::HTTP_OK,
                'message'=> "Product data with id $id successfully found",
                "data"=> $findProduct
            ]);
        }
        catch(Exception $e){
            return response()->json([
                'message'=> $e->getMessage()
            ]);
        }
    }

    // Update Current Product
    public function update(Request $request, string $id)
    {
        $updateProduct = Product::findOrFail($id);

        if($updateProduct)
        {
            $validate = Validator::make($request->all(), [
                'nama_product' => 'string',
                'description_product' => 'string',
                'stock_amount' => 'integer',,
                'id_supplier' => 'integer',
                'status' => 'string',
            ]);

            if($validate->fails())
            {
                return response()->json([
                    'message'=> $validate->errors()->first(),
                ]);
            }
            else
            {
                try{
                    if($request->filled('nama_product')){
                        $updateProduct->nama_Product = $request->nama_Product;
                    }
                    if($request->filled('description_product')){
                        $updateProduct->description_product = $request->description_product;
                    }
                    if($request->filled('stock_amount')){
                        $updateProduct->stock_amount = $request->stock_amount;
                    }
                    if($request->filled('id_supplier')){
                        $updateProduct->id_supplier = $request->id_supplier;
                    }
                    if($request->filled('status')){
                        $updateProduct->status = $request->status;
                    }

                    $updateProduct->save();

                    return response()->json([
                        'code' => Response::HTTP_OK,
                        'message'=> "Product data with id $id has been successfully updated",
                        "data"=> $updateProduct
                    ]);
                }
                catch(Exception $e){
                    return response()->json([
                        "message"=> $e->getMessage()
                    ]);
                }
            }
        }
        else
        {
            return response()->json([
                'message'=> "Update failed! Product data with id $id not found"
            ]);
        }
    }

    // Delete Current Product
    public function destroy(string $id)
    {
        try{
            $findProduct = Product::findOrFail($id);
            $findProduct->delete();
            return response()->json([
                "code" => Response::HTTP_OK,
                "message"=> "Product data has been successfully deleted"
            ]);
        }
        catch(Exception $e){
            return response()->json([
                "message" => $e->getMessage()
            ]);
        }
    }
}
