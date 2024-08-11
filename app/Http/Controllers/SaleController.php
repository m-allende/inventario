<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if(is_array($request->search) && $request->search["value"] != null){
                $values = Sale::with(["client", "services", "promotions", "products" => function($query) {
                                    $query->with(["brand"]);
                            }])->where('name', "like", '%' . $request->search["value"] . '%')->get();
            }else if($request->search != null && !is_array($request->search)){
                $values = Sale::with(["client", "services", "promotions", "products" => function($query) {
                                    $query->with(["brand"]);
                            }])->where('name', "like", '%' . $request->search . '%')->get();
            }else{
                $values = Sale::with(["client", "services", "promotions", "products" => function($query) {
                                    $query->with(["brand"]);
                            }])->get();
            }

            return datatables()->of($values)->toJson();
        }

        return view('sale.index');
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
        dd($request);
        DB::beginTransaction();
        try {
            $date = explode("-",$request["date"]);
            $request["date"] = $date[2]."-".$date[1]."-".$date[0];
            $sale = Sale::create($request->all());
            $data = json_decode($request["detail"]);
            foreach ($data as $key => $value) {
                $sale->products()->attach($value[0], ['quantity' => $value[1], 'price'=> $value[2], 'total'=> $value[3]]);
            }

            //DB::rollback();
            DB::commit();

            return response()->json([
                'status' => 200,
                'errors' => '',
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'status' => 400,
                'errors' => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
