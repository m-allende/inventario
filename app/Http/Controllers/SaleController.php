<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Observation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if(is_array($request->search) && $request->search["value"] != null){
                $values = Sale::with(["client", "lastObservation", "services", "promotions" => function($query) {
                                    $query->with(["products", "services"]);
                            }, "products" => function($query) {
                                    $query->with(["brand"]);
                            }])->where('name', "like", '%' . $request->search["value"] . '%')->get();
            }else if($request->search != null && !is_array($request->search)){
                $values = Sale::with(["client", "lastObservation", "services", "promotions" => function($query) {
                                    $query->with(["products", "services"]);
                            }, "products" => function($query) {
                                    $query->with(["brand"]);
                            }])->where('name', "like", '%' . $request->search . '%')->get();
            }else{
                $values = Sale::with(["client", "lastObservation", "services", "promotions"=> function($query) {
                                    $query->with(["products", "services"]);
                            }, "products" => function($query) {
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
        return view('sale.create');
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
            //dd($request);
            DB::beginTransaction();
            try {
                $date = explode("-",$request["date"]);
                $request["date"] = $date[2]."-".$date[1]."-".$date[0];
                $sale = Sale::create($request->all());

                $dataProducts = json_decode($request["products"]);
                foreach ($dataProducts as $key => $value) {
                    $sale->products()->attach($value[0], ['quantity' => $value[1], 'price'=> $value[2], 'total'=> $value[3]]);
                }

                $dataServices = json_decode($request["services"]);
                foreach ($dataServices as $key => $value) {
                    $sale->services()->attach($value[0], ['quantity' => $value[1], 'price'=> $value[2], 'total'=> $value[3]]);
                }

                $dataPromotions = json_decode($request["promotions"]);
                foreach ($dataPromotions as $key => $value) {
                    $sale->promotions()->attach($value[0], ['quantity' => $value[1], 'price'=> $value[2], 'total'=> $value[3]]);
                }

                $obs = new Observation();
                $obs->observation = $request["observation"];
                $sale->observations()->save($obs);

                //DB::rollback();
                DB::commit();

                return response()->json([
                    'status' => 200,
                    'errors' => '',
                    'sale' => $sale,
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
    public function show(Sale $sale)
    {

        $pdf = Pdf::loadView('sale.voucher', ['sale' => $sale]);
        //return $pdf->download('voucher.pdf');
        return $pdf->stream();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        return view('sale.voucher',['sale' => $sale]);
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

    public function validator(Request $request, $id)
    {
        $rules = [
            'number' => ['required'],
            'total' => 'required|numeric|min:1'
        ];


        $messages =  [
            'number.required' => 'Debe ingresar número de Boleta y/o Factura',
            'total.required' => 'Debe ingresar Productos, Servicios o Promociones',
            'total.min' => 'Debe ingresar Productos, Servicios o Promociones',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        return $validator;
    }
}
