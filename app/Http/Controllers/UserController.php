<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProfileFormRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function profile()
    {
        return view('auth.profile', ['user' => Auth::user(), 'updated' => false, 'customError' => false]);
    }

    public function saveProfile(ProfileFormRequest $request)
    {
        $update = [];

        if($request->email_address === Auth::user()->email_address){
        }else if(User::where('email_address', '=', $request->email_address)->first()){

            return view('auth.profile', ['user' => Auth::user(), 'updated' => false, 'customError' => 'Cette adresse email est déjà utilisée !']);

        }else{
            $update += [
                'email_address' => $request->email_address
            ];
        }

        if($request->password){
            $update += [
                'password' => $request->password
            ];
        }

        if(is_null($request->address) && is_null($request->town) && is_null($request->postal_code)){
            $update += [
                'family_name' => $request->family_name,
                'given_name' => $request->given_name,
            ];
        }else if(is_null($request->address) || is_null($request->town) || is_null($request->postal_code)){
            return view('auth.profile', ['user' => Auth::user(), 'updated' => false, 'customError' => 'L\'adresse est incomplète !']);
        }else{
            $update += [
                'family_name' => $request->family_name,
                'given_name' => $request->given_name,
                'address' => $request->address,
                'town' => $request->town,
                'postal_code' => $request->postal_code
            ];
        }

        if(!is_null($request->password)){
            $update += ['password' => Hash::make($request->password)];
        }

        $updatedDate = date('Y-m-d H:i:s');
        $update += ['updated_at' => $updatedDate];

        $user = User::findOrFail(Auth::user()->id);


        DB::table('users')
            ->where(['id' => $user->id])
            ->update($update);

        $valuesChangedUser = DB::table('users')->where(['id' => $user->id])->first();

        return view('auth.profile', ['user' => $valuesChangedUser, 'updated' => true, 'customError' => false]);
    }
}
