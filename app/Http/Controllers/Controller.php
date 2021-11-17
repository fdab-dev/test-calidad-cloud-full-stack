<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //public function saveUser(Request $request){
    public function saveUser(UserRequest $request){
        // guardar usuario
        $object = new User();
        $object->name     = $request->name;
        $object->email    = $request->email;
        $object->password = Hash::make($request->password);
        $object->birthday = $request->birthday;
        $object->status   = $request->status;
                
        try {
            $object->save();
            $resp = 'success';
        } catch (\Exception $e) {
            $resp = 'error';
        }     

        return $resp;
    }

    public function updateUser(Request $request){
        // actualizar usuario
        $object = User::find($request->id);
        $object->name     = $request->name;
        $object->email    = $request->email;
        $object->password = Hash::make($request->password);
        $object->birthday = $request->birthday;
        $object->status   = $request->status;
                
        try {
            $object->save();
            $resp = 'success';
        } catch (\Exception $e) {
            $resp = 'error';
        }

        return $resp;
    }

    public function getUsers(Request $request){
        $data = User::orderBy('name', 'asc')->paginate($request['per_page']);

        return [
            'pagination'=>[
                'total'        => $data->total(),
                'current_page' => $data->currentPage(),
                'per_page'     => $data->perPage(),
                'last_page'    => $data->lastPage(),
                'from'         => $data->firstItem(),
                'to'           => $data->lastPage()
            ],  
            'rows' => $data
        ];
    }

    public function getUser(Request $request){
        $data = User::where('id', $request->id)->get();

        return [
            'rows' => UserResource::collection($data)
        ];
    }

    public function deleteUser(Request $request){
        // actualizar usuario
        $object = User::find($request->id);
        $object->status   = '3';
        $object->deleted  = date('Y-m-d H:i:s');        
                
        try {
            $object->save();
            $resp = 'success';
        } catch (\Exception $e) {
            $resp = 'error';
        }

        return $resp;
    }
}
