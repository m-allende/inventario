<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash; // <-- import it at the top
use Illuminate\Support\Facades\DB;
use DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if(is_array($request->search) && $request->search["value"] != null){
                $values = User::with('roles')->where('name', "like", '%' . $request->search["value"] . '%')->get();
            }else if($request->search != null && !is_array($request->search)){
                $values = User::with('roles')->where('name', "like", '%' . $request->search . '%')->get();
            }else{
                $values = User::with('roles')->get();
            }

            return datatables()->of($values)->toJson();
        }

        return view('user.index');
    }

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
                $request["password"] = Hash::make($request["password"]);
                $user = User::create($request->all());

                $role = Role::whereid($request["role_id"])->first();
                $user->assignRole($role->name);

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

    public function update(Request $request, User $user)
    {
        $validator = $this->validator($request, $user->id);
        $error = $validator->errors();
        if ($error->first()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            DB::beginTransaction();
            try {
                $input = $request->all();
                if(isset($input["password"])){
                    if($input["password"] == ""){
                        unset($input["password"]);
                    }else{
                        $input["password"] = Hash::make($input["password"]);
                    }
                }else{
                    unset($input["password"]);
                }
                //codigo si no tiene error
                User::find($user->id)->update($input);

                $role = Role::whereid($request["role_id"])->first();

                $user->syncRoles([$role->name]);

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

    public function destroy(Brand $brand)
    {
        $deleted = $brand->delete();
        if ($deleted) {
            return response()->json([
                'status' => 200,
                'message' => "Eliminado Correctamente",
            ]);
        }
    }

    public function validator(Request $request, $id)
    {
        if($id == 0){
            $rules = [
                'name' => ['required',Rule::unique('users')->ignore($id),],
                'email' => ['required', 'email',Rule::unique('users')->ignore($id),],
                'password' => ['required', 'min:6'],
                'role_id' => ['required'],
            ];
        }else{
            $rules = [
                'name' => ['required',Rule::unique('users')->ignore($id),],
                'email' => ['required','email',Rule::unique('users')->ignore($id),],
                'password' => ['nullable','min:6'],
                'role_id' => ['required'],
            ];
        }

        $messages =  [
            'name.required' => 'Debe ingresar Nombre',
            'email.required' => 'Debe ingresar Email',
            'email.email' => 'Email tiene formato incorrecto',
            'password.required' => 'Debe ingresar contraseña',
            'password.min' => 'Contraseña debe contener minimo 6 caracteres',
            'role_id.required' => 'Debe ingresar Rol',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        return $validator;
    }
}
