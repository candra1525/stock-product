<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class SupplierApiController extends Controller
{
    // Show All Supplier
    public function index()
    {
        try{
            $supplier = Supplier::all();
            return response()->json([
                "code" => Response::HTTP_OK,
                "message"=> "Supplier data displays successfully",
                "data"=> $supplier
            ]);
        }
        catch(Exception $e){
            return response()->json([
                "message" => $e->getMessage()
            ]);
        }
    }

    // Insert Supplier
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nama_supplier' => 'required|string'
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
                $insertSupplier = Supplier::create($validated);
                return response()->json([
                    'code'=> Response::HTTP_CREATED,
                    'message'=> 'Supplier data added successfully',
                    'data'=> $insertSupplier
                ]);
            }
            catch(Exception $e){
                return response()->json([
                    'message'=> $e->getMessage()
                ]);
            }
        }
    }

    // Show Current Supplier
    public function show(string $id)
    {
        try{
            $findSuppllier = Supplier::findOrFail($id);
            return response()->json([
                'code'=> Response::HTTP_OK,
                'message'=> "Supplier data with id $id successfully found",
                "data"=> $findSuppllier
            ]);
        }
        catch(Exception $e){
            return response()->json([
                'message'=> $e->getMessage()
            ]);
        }
    }

    // Update Current Supplier
    public function update(Request $request, string $id)
    {
        $updateSupplier = Supplier::findOrFail($id);

        if($updateSupplier)
        {
            $validate = Validator::make($request->all(), [
                'nama_supplier'=> 'string',
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
                    if($request->filled('nama_supplier')){
                        $updateSupplier->nama_supplier = $request->nama_supplier;
                    }

                    $updateSupplier->save();

                    return response()->json([
                        'code' => Response::HTTP_OK,
                        'message'=> "Supplier data with id $id has been successfully updated",
                        "data"=> $updateSupplier
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
                'message'=> "Update failed! Supplier data with id $id not found"
            ]);
        }
    }

    // Delete Current Supplier
    public function destroy(string $id)
    {
        try{
            $findSupplier = Supplier::findOrFail($id);
            $findSupplier->delete();
            return response()->json([
                "code" => Response::HTTP_OK,
                "message"=> "Supplier data has been successfully deleted"
            ]);
        }
        catch(Exception $e){
            return response()->json([
                "message" => $e->getMessage()
            ]);
        }
    }
}
