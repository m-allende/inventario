<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Price;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use DataTables;
use Yajra\DataTables\EloquentDataTable;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if(is_array($request->search) && $request->search["value"] != null){
                $values = Product::with(["brand", "category", "presentation", "lastPrice", "lastPhoto"])
                                ->where('name', "like", '%' . $request->search["value"] . '%')
                                ->orWhere('code', "like", '%' . $request->search["value"] . '%')
                                ->orWhereHas("brand", function($query) use($request){
                                    $query->where('name', "like", '%' . $request->search["value"] . '%');
                                })
                                ->orWhereHas("category", function($query) use($request){
                                    $query->where('name', "like", '%' . $request->search["value"] . '%');
                                })
                                ->get();
            }else if($request->search != null && !is_array($request->search)){
                $values = Product::with(["brand", "category", "presentation", "lastPrice", "lastPhoto"])
                                ->where('name', "like", '%' . $request->search . '%')
                                ->orWhere('code', "like", '%' . $request->search . '%')
                                ->orWhereHas("brand", function($query) use($request){
                                    $query->where('name', "like", '%' . $request->search . '%');
                                })
                                ->orWhereHas("category", function($query) use($request){
                                    $query->where('name', "like", '%' . $request->search . '%');
                                })
                                ->get();
            }else{
                if($request->length && !$request->start){
                    $values = Product::with(["brand", "category", "presentation", "lastPrice", "lastPhoto"])->limit($request->length)->get();
                }else{
                    $values = Product::with(["brand", "category", "presentation", "lastPrice", "lastPhoto"])->get();
                }                
            }

            return datatables()->of($values)
                    ->addColumn('stock', function(Product $product) {
                        return $this->stock($product->id);
                    })
                    ->toJson();
        }

        return view('product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $this->validator($request,0);
        $error = $validator->errors();
        if ($error->first()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $input = request()->all();
            if($input["expiration"] != null){
                $date = explode("-",$input["expiration"]);
                $input["expiration"] = $date[2]."-".$date[1]."-".$date[0];
            }
            DB::beginTransaction();
            try {
                $product = Product::create($input);

                $price = new Price();
                $price->price = 0;
                $product->prices()->save($price);

                if(isset($input["image"])){
                    $image = $input["image"];
                    $image = str_replace('data:image/png;base64,', '', $image);
                    $image = str_replace(' ', '+', $image);
                    $imageName = time() .'.'.'jpg';
                    \File::put(public_path('img/upl/'). $imageName, base64_decode($image));

                    $photo = new Photo();
                    $photo->path = 'img/upl/'. $imageName;
                    $product->photos()->save($photo);
                }

                DB::commit();

                return response()->json([
                    'status' => 200,
                    'errors' => $validator->messages(),
                ]);
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json([
                    'status' => 400,
                    'errors' => $e->getMessage()
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product = Product::with(["prices"])->whereId($product->id)->first();
        $validator = $this->validator($request, $product->id);
        $error = $validator->errors();
        if ($error->first()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $input = request()->all();
            if($input["expiration"] != null){
                $date = explode("-",$input["expiration"]);
                $input["expiration"] = $date[2]."-".$date[1]."-".$date[0];
            }
            DB::beginTransaction();
            try {
                //codigo si no tiene error
                $product->update($input);

                if(!$product->prices()->exists()){
                    $price = new Price();
                    $price->price = 0;
                    $product->prices()->save($price);
                }

                if(isset($input["image"])){
                    $image = $input["image"];
                    $image = str_replace('data:image/png;base64,', '', $image);
                    $image = str_replace(' ', '+', $image);
                    $imageName = time() .'.'.'jpg';
                    \File::put(public_path('img/upl/'). $imageName, base64_decode($image));

                    $photo = new Photo();
                    $photo->path = 'img/upl/'. $imageName;
                    $product->photos()->save($photo);
                }

                DB::commit();

                return response()->json([
                    'status' => 200,
                    'errors' => $validator->messages(),
                ]);
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json([
                    'status' => 400,
                    'errors' => $e->getMessage()
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $deleted = $product->delete();
        if ($deleted) {
            return response()->json([
                'status' => 200,
                'message' => "Eliminado Correctamente",
            ]);
        }
    }

    public function validator(Request $request, $id)
    {
        $rules = [
            'name' => ['required'],
            'code' => ['required'],
            'brand_id' => ['required'],
            'category_id' => ['required'],
            'presentation_id' => ['required'],
        ];


        $messages =  [
            'name.required' => 'Debe ingresar Nombre',
            'code.required' => 'Debe ingresar Código',
            'brand_id.required' => 'Debe ingresar Marca',
            'category_id.required' => 'Debe ingresar Categoria',
            'presentation_id.required' => 'Debe ingresar Presentacion',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        return $validator;
    }

    public function stock($id){
        $purchases = DB::table('purchase_product')
                    ->selectRaw('sum(quantity) as cantidad')
                    ->where('product_id', "=", $id)
                    ->first();
        $stock = ($purchases->cantidad == null?0:$purchases->cantidad);

        $sales = DB::table('product_sale')
                    ->selectRaw('sum(quantity) as cantidad')
                    ->where('product_id', "=", $id)
                    ->first();

        $remove = ($sales->cantidad == null?0:$sales->cantidad);

        $stock = $stock - $remove;
        return $stock;
    }
}
