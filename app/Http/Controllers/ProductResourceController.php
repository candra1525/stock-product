<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class ProductResourceController extends Controller
{
    public function index()
    {
        try{
            $product = Product::all();
            return view("product")->with("product", $product);
        }
        catch(Exception $e){
            return redirect()->back()->with("error", $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nama_product' => 'required|string',
            'description_product' => 'required|string',
            'stock_amount' => 'required|integer',
            'id_supplier' => 'required|integer',
            'status' => 'required|string',
        ]);

        if($validate->fails()){
            return redirect()->back()->with('error', $validate->errors()->first());
        }
        else
        {
            $validated = $validate->validated();
            try{
                $insertProduct = Product::create($validated);
                return redirect('/allproduct')->with('success', 'Successfully add data');
            }
            catch(Exception $e){
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
    }

    public function addprod()
    {
        return view("addproduct");
    }

    public function show(string $id)
    {
        try
        {
            $findProduct = Product::findOrFail($id);
            return view("detailproduct")->with("product", $findProduct);
        }
        catch(Exception $e){
            return redirect()->back()->with("error", $e->getMessage());
        }
    }

    public function showForEdit(string $id)
    {
        try
        {
            $findProduct = Product::findOrFail($id);
            return view("editproduct")->with("product", $findProduct);
        }
        catch(Exception $e){
            return redirect()->back()->with("error", $e->getMessage());
        }
    }

    public function update(Request $request, string $id)
    {
        $updateProduct = Product::findOrFail($id);

        if ($updateProduct) {
            $validate = Validator::make($request->all(), [
                'nama_product' => 'string',
                'description_product' => 'string',
                'stock_amount' => 'integer',
                'id_supplier' => 'integer',
                'status' => 'string',
            ]);

            if ($validate->fails()) {
                return redirect()->back()->with('error', $validate->errors()->first());
            } else {
                try {
                    if ($request->filled('nama_product')) {
                        $updateProduct->nama_product = $request->nama_product; // Corrected property name
                    }
                    if ($request->filled('description_product')) {
                        $updateProduct->description_product = $request->description_product;
                    }
                    if ($request->filled('stock_amount')) {
                        $updateProduct->stock_amount = $request->stock_amount;
                    }
                    if ($request->filled('id_supplier')) {
                        $updateProduct->id_supplier = $request->id_supplier;
                    }
                    if ($request->filled('status')) {
                        $updateProduct->status = $request->status;
                    }

                    $updateProduct->update();

                    return redirect('/allproduct')->with('success', 'Successfully edit data');
                } catch (Exception $e) {
                    return redirect()->back()->with('error', $e->getMessage());
                }
            }
        } else {
            return redirect()->back()->with('error', "Update Failed !");
        }
    }


    public function destroy(string $id)
    {
        try{
            $findProduct = Product::findOrFail($id);
            $findProduct->delete();
            return redirect('/allproduct')->with("success", "Product deleted successfully");
        }
        catch(Exception $e){
            return redirect()->back()->with("error", $e->getMessage());
        }
    }
}
