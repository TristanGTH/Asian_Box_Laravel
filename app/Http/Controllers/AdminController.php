<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileFormRequest;
use App\Http\Requests\ActualiteFormRequest;
use App\Http\Requests\PlanFormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class AdminController extends Controller
{

    public function admin()
    {
        $nbUsers = DB::table('users')->count();
        $nbActualites = DB::table('actualites')->count();
        $nbPlans = DB::table('plans')->count();

        return view('auth.admin.admin', ['nbUsers' => $nbUsers, 'nbActualites' => $nbActualites, 'nbPlans' => $nbPlans]);
    }


    public function adminUsers()
    {
        $users = DB::table('users')->get(); //get all users
        return view('auth.admin.admin-users', ['users' => $users, 'message' => null]);
    }

    public function adminNewUser()
    {
        return view('auth.admin.admin-create-user', ['message' => null]);
    }

    public function adminCreateNewUser(ProfileFormRequest $request)
    {
        $create = [];

        if(User::where('email_address', '=', $request->email_address)->first()){

            return view('auth.admin.admin-create-user', ['message' => 'Cette adresse email est déjà utilisée !']);

        }else{
            $create += [
                'email_address' => $request->email_address
            ];
        }

        if(is_null($request->address) && is_null($request->town) && is_null($request->postal_code)){
            $create += [
                'family_name' => $request->family_name,
                'given_name' => $request->given_name,
            ];
        }else if(is_null($request->address) || is_null($request->town) || is_null($request->postal_code)){
            return view('auth.admin.admin-create-user', ['message' => 'L\'adresse est incomplète !']);
        }else{
            $create += [
                'family_name' => $request->family_name,
                'given_name' => $request->given_name,
                'address' => $request->address,
                'town' => $request->town,
                'postal_code' => $request->postal_code
            ];
        }

        if(!is_null($request->password)){
            $create += ['password' => Hash::make($request->password)];
        }

        if(!is_null($request->is_admin))
            $create += ['is_admin' => 1];
        else
            $create += ['is_admin' => 0];

        DB::table('users')->insert($create);

        $users = DB::table('users')->get();


        return redirect(route('admin.users'))->with(['users' => $users])->with('success', 'Utilisateur créé avec succès !');

    }

    public function adminCurrentUser($id)
    {
        $checkId = DB::table('users')->where('id', $id)->first();

        if(is_null($checkId)){
            $users = DB::table('users')->get();
            return redirect(route('admin.users'))->with('users', $users);
        }


        $user = DB::table('users')->where('id', $id)->first();
        return view('auth.admin.admin-current-user', ['user' => $user, 'message' => null, 'messageGreen' => null]);
    }

    public function adminUpdateCurrentUser(ProfileFormRequest $request, $id)
    {
        $checkId = DB::table('users')->where('id', $id)->first();

        if(is_null($checkId)){
            $users = DB::table('users')->get();
            return redirect(route('admin.users'))->with('users', $users);
        }

        $user = DB::table('users')->where('id', $id)->first();

        $update = [];

        if($request->email_address === $user->email_address){
        }else if(User::where('email_address', '=', $request->email_address)->first()){

            return view('auth.admin.admin-current-user', ['user' => $user, 'message' => 'Cette adresse email est déjà utilisée !', 'messageGreen' => null]);

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
            return view('auth.admin.admin-current-user', ['user' => $user, 'message' => 'L\'adresse est incomplète !', 'messageGreen' => null]);
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

        if(!is_null($request->is_admin))
            $update += ['is_admin' => 1];
        else
            $update += ['is_admin' => 0];

        DB::table('users')
            ->where(['id' => $id])
            ->update($update);

        $valuesChangedUser = DB::table('users')->where(['id' => $id])->first();

        return view('auth.admin.admin-current-user', ['user' => $valuesChangedUser, 'messageGreen' => 'Utilisateur mis à jour avec succès !', 'message' => null]);

    }

    public function adminDeleteCurrentUser($id)
    {
        $checkId = DB::table('users')->where('id', $id)->first();

        if(is_null($checkId)){
            $users = DB::table('users')->get();
            return redirect(route('admin.users'))->with('users', $users);
        }

        DB::table('users')->where('id', $id)->delete();

        $users = DB::table('users')->get();

        return redirect(route('admin.users'))->with(['users' => $users])->with('success', 'Utilisateur supprimé avec succès !');

    }


    public function adminActualites()
    {
        $actualites = DB::table('actualites')->get(); //get all actus
        return view('auth.admin.admin-actualites', ['actualites' => $actualites, 'message' => null]);
    }

    public function adminCurrentActualite($id)
    {
        $checkId = DB::table('actualites')->where('id', $id)->first();

        if(is_null($checkId)){
            $actualites = DB::table('actualites')->get();
            return redirect(route('admin.actualites'))->with('actualites', $actualites);
        }

        $actualite = DB::table('actualites')->where('id', $id)->first();
        return view('auth.admin.admin-current-actualite', ['actualite' => $actualite, 'message' => null]);
    }

    public function adminUpdateCurrentActualite(ActualiteFormRequest $request, $id)
    {
        $checkId = DB::table('actualites')->where('id', $id)->first();

        if(is_null($checkId)){
            $actualites = DB::table('actualites')->get();
            return redirect(route('admin.actualites'))->with('actualites', $actualites);
        }

        $actualite = DB::table('actualites')->where('id', $id)->first();

        $updateValues = [
            'name' => $request->name,
            'short_description' => $request->short_description,
            'description' => $request->description,
        ];

        if($request->image){

            $result = $request->image->storeOnCloudinary();

            $updateValues += [
                'image' => $result->getSecurePath()
            ];
        }

        if($request->is_visible)
            $updateValues += ['is_visible' => true];
        else
            $updateValues += ['is_visible' => false];


        DB::table('actualites')
            ->where(['id' => $actualite->id])
            ->update($updateValues);

        $actualite = DB::table('actualites')->where('id', $actualite->id)->first();
        return view('auth.admin.admin-current-actualite', ['actualite' => $actualite, 'message' => 'Actualité mise à jour !']);
    }

    public function adminNewActualite()
    {
        return view('auth.admin.admin-create-actualite', ['message' => null]);
    }

    public function adminCreateNewActualite(ActualiteFormRequest $request)
    {

        $result = $request->image->storeOnCloudinary();

        $createValues = [
            'name' => $request->name,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'image' => $result->getSecurePath()
        ];

        if($request->is_visible)
            $createValues += ['is_visible' => true];
        else
            $createValues += ['is_visible' => false];

        DB::table('actualites')->insert($createValues);

        $actualites = DB::table('actualites')->get(); //get all actus

        return redirect(route('admin.actualites'))->with(['actualites' => $actualites])->with('success', 'Actualité créée avec succès !');
    }


    public function adminDeleteCurrentActualite($id)
    {
        $checkId = DB::table('actualites')->where('id', $id)->first();

        if(is_null($checkId)){
            $actualites = DB::table('actualites')->get();
            return redirect(route('admin.actualites'))->with('actualites', $actualites);
        }

        DB::table('actualites')->where('id', $id)->delete();

        $actualites = DB::table('actualites')->get();

        return redirect(route('admin.actualites'))->with(['actualites' => $actualites])->with('success', 'Actualité supprimée avec succès !');

    }



    public function adminPlans()
    {
        $plans = DB::table('plans')->get(); //get all plans
        return view('auth.admin.admin-plans', ['plans' => $plans, 'deleted' => false]);
    }

    public function adminNewPlan()
    {
        return view('auth.admin.admin-create-plan', ['message' => null]);
    }

    public function adminCreateNewPlan(PlanFormRequest $request)
    {
        $create = [
            'name' => $request->name,
            'price' => $request->price,
            'stripe_id' => $request->stripe_id,
        ];

        DB::table('plans')->insert($create);

        $plans = DB::table('plans')->get();

        return redirect(route('admin.plans'))->with(['plans' => $plans])->with('success', 'Plan créé avec succès !');
    }


    public function adminCurrentPlan($id)
    {
        $checkId = DB::table('plans')->where('id', $id)->first();

        if(is_null($checkId)){
            $plans = DB::table('plans')->get();
            return redirect(route('admin.plans'))->with('plans', $plans);
        }

        $plan = DB::table('plans')->where('id', $id)->first();
        return view('auth.admin.admin-current-plan', ['plan' => $plan, 'message' => null]);
    }

    public function adminUpdateCurrentPlan(PlanFormRequest $request, $id)
    {
        $checkId = DB::table('plans')->where('id', $id)->first();

        if(is_null($checkId)){
            $plans = DB::table('plans')->get();
            return redirect(route('admin.plans'))->with('plans', $plans);
        }


        $update = [
            'name' => $request->name,
            'price' => $request->price,
            'stripe_id' => $request->stripe_id,
        ];


        DB::table('plans')->where('id', $id)->update($update);

        $plan = DB::table('plans')->where('id', $id)->first();

        return view('auth.admin.admin-current-plan', ['plan' => $plan, 'message' => 'Plan mis à jour !']);
    }

    public function adminDeleteCurrentPlan($id)
    {
        $checkId = DB::table('plans')->where('id', $id)->first();

        if(is_null($checkId)){
            $plans = DB::table('plans')->get();
            return redirect(route('admin.plans'))->with('plans', $plans);
        }

        $planToDelete = DB::table('plans')->where('id', $id)->first();

        DB::table('plans')->where('id', $id)->delete();

        $plans = DB::table('plans')->get();
        return redirect(route('admin.plans'))->with(['plans' => $plans])->with('success', 'Plan supprimé avec succès !');
    }

}
