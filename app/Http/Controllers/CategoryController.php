<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if(is_array($request->search) && $request->search["value"] != null){
                $values = Category::with(["lastPhoto"])->where('name', "like", '%' . $request->search["value"] . '%')->get();
            }else if($request->search != null && !is_array($request->search)){
                $values = Category::with(["lastPhoto"])->where('name', "like", '%' . $request->search . '%')->get();
            }else{
                $values = Category::with(["lastPhoto"])->get();
            }

            return datatables()->of($values)->toJson();
        }

        return view('category.index');
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
            DB::beginTransaction();
            try {
                $category = Category::create($request->all());
                $input = request()->all();
                if(isset($input["image"])){
                    $image = $input["image"];
                    $image = str_replace('data:image/png;base64,', '', $image);
                    $image = str_replace(' ', '+', $image);
                    $imageName = time() .'.'.'jpg';
                    \File::put(public_path('img/upl/'). $imageName, base64_decode($image));

                    $photo = new Photo();
                    $photo->path = 'img/upl/'. $imageName;
                    $category->photos()->save($photo);
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
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validator = $this->validator($request, $category->id);
        $error = $validator->errors();
        if ($error->first()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            DB::beginTransaction();
            try {
                //codigo si no tiene error
                Category::find($category->id)->update(request()->all());
                $input = request()->all();

                if(isset($input["image"])){
                    $image = $input["image"];
                    $image = str_replace('data:image/png;base64,', '', $image);
                    $image = str_replace(' ', '+', $image);
                    $imageName = time() .'.'.'jpg';
                    \File::put(public_path('img/upl/'). $imageName, base64_decode($image));

                    $photo = new Photo();
                    $photo->path = 'img/upl/'. $imageName;
                    $category->photos()->save($photo);
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
    public function destroy(Category $category)
    {
        $deleted = $category->delete();
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
            'name' => ['required',Rule::unique('categories')->ignore($id),],
        ];


        $messages =  [
            'name.required' => 'Debe ingresar Nombre',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        return $validator;
    }
}
