<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\api\BaseController as BaseController;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends BaseController
{
    public function signin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $authUser = Auth::user();
            $success['token'] =  $authUser->createToken('MyAuthApp')->plainTextToken;
            $success['name'] =  $authUser->name;

            return $this->sendResponse($success, 'User signed in');
        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }
    }

    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Error validation', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['tipo_user'] = 'paciente';
        $input['medico_id'] = null;
        $input['paciente_id'] = null;
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyAuthApp')->plainTextToken;
        $success['email'] =  $user->email;
        $success['name'] =  $user->name;

        return $this->sendResponse($success, 'User created successfully.');
    }

    public function signoff(Request $request)
    {
        //$user = User::find($request->id)->get();
        $authUser = Auth::user();
        $authUser->currentAccessToken()->delete();
        //$request->user()->currentAccessToken()->delete();
        return response()->json([
            'success' => true,
            'message' => 'Token eliminado correctamente',
        ], 200);
    }
}
