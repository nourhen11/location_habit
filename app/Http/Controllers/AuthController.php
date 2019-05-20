<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Crypt;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function handleUserRegister(Request $request){
        $data=$request->all();
        $rules= [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'phone' => ['required'],
        ];

        $validation = Validator::make($data, $rules);
        if ($validation->fails()) {
            return ($validation->errors());
        }
       
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' =>$data['last_name'],
            'email' => $data['email'],
            'password' =>  bcrypt($data['password']),
            'phone' => $data['phone'],
            'photo' => $data['photo'],
            'role_id' => 2
        ]);

    }
    

    public function handleUserLogin(Request $request){
       
        /*$status = 401;
        $response = ['error' => 'Unauthorised'];

        if (Auth::attempt($request->only(['email', 'password']))) {
            $token = auth()->user()->createToken('LocationHabit')->accessToken;
            $status = 200;
            $response = [
                  'token' => $token
               ];
        }

        return response()->json($response, $status);*/

        
        $http = new \GuzzleHttp\Client;
        try {
            $response = $http->post(config('services.passport.login_endpoint'), [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => config('services.passport.client_id'),
                    'client_secret' => config('services.passport.client_secret'),
                    'username' => $request->email,
                    'password' => $request->password,
                ]
            ]);
            return $response->getBody();
        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            if ($e->getCode() === 400) {
                return response()->json('Invalid Request. Please enter a username or a password.', $e->getCode());
            } else if ($e->getCode() === 401) {
                return response()->json('Your credentials are incorrect. Please try again', $e->getCode());
            }
            return response()->json('Something went wrong on the server.', $e->getCode());
        }
    }
}
