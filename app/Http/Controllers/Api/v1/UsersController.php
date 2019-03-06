<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Resources\v1\UserCollection;
use App\User;
use App\Http\Resources\v1\User as UserResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class UsersController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validData = $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $validData['name'],
            'email' => $validData['email'],
            'password' => bcrypt($validData['password']),
        ]);

        return new UserResource($user);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return UserResource
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {

        $validData = $this->validate($request, [
            'name' => 'string|max:255',
        ]);
        $user = $request->user();
        if($request['name']){
            $user->update(['name'=>$request['name']]);
        }
        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = $request->user();
        $user->delete();
        return response()->json([
            'data' => [
                'message'=>'delete users'
            ],
            'error' => [],
            'status' => 'success'
        ], 200);
    }
}
