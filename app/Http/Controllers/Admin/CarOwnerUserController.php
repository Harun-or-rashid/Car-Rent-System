<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CarOwnerUserController extends Controller
{
    /*show user list*/
    public function index()
    {
        $users = User::get();
        return view('admin.car_owner_user.user_list', compact('users'));
    }


    /*show add new user form*/
    public function create()
    {
        return view('admin.car_owner_user.add_new_user');
    }


    /*store new user*/
    public function store(Request $request)
    {
        $validateData = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required|min:3',
            'role' => 'required',
        ]);

        if ($validateData->fails()) {
            return redirect()->back()->withInput()->withErrors($validateData);
        }

        try {
            $addUser = User::create([
                'name' => $request->name,
                'company_name' => $request->company_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => bcrypt($request->password),
                'role' => $request->role,
                'address' => $request->address,
            ]);


            if($addUser){
                if ($request->hasFile('image')) {
                    $files = $request->file('image');
                    $name = str_random(20) . $addUser->id . '.' . $files->getClientOriginalExtension();
                    $destinationPath = 'assets/uploads/User_Logo';
                    $url = $destinationPath . "/" . $name;
                    $files->move($destinationPath, $name);
                    $logoUpd = User::where('id', $addUser->id)->update([
                        'logo' => $name,
                    ]);
                }
                session()->flash('type', 'success');
                session()->flash('message', 'Successfully added new user...!');
                return redirect()->back();

            }else{
                session()->flash('type', 'danger');
                session()->flash('message', 'something went wrong to add user. please try again....!');
                return redirect()->back();
            }


        } catch (\Exception $e) {
            session()->flash('type', 'danger');
            session()->flash('message', 'something went wrong to add user. please try again....!');
            return redirect()->back();
        }

    }


    /*show edit form of user*/
    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        if($user){
            return view('admin.car_owner_user.edit_user', compact('user'));
        }else{
            session()->flash('type', 'danger');
            session()->flash('message', 'Unknown user. please try again....!');
            return redirect()->back();
        }

    }


    /*update uesr*/
    public function update(Request $request, $id)
    {
        $validateData = Validator::make($request->all(), [
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'id')->ignore($id)],
            'phone' => ['required', Rule::unique('users', 'id')->ignore($id)],
            'password' => 'required|min:3',
            'role' => 'required',
        ]);

        if ($validateData->fails()) {
            return redirect()->back()->withInput()->withErrors($validateData);
        }

        try {
            $updUser = User::where('id', $id)->first();
            if($updUser){
                $updUser->name = $request->name;
                $updUser->company_name = $request->company_name;
                $updUser->email = $request->email;
                $updUser->phone = $request->phone;
                $updUser->password = bcrypt($request->password);
                $updUser->role = $request->role;
                $updUser->address = $request->address;

                if ($request->hasFile('image')) {
                    $files = $request->file('image');
                    $name = str_random(20) . $id . '.' . $files->getClientOriginalExtension();
                    $destinationPath = 'assets/uploads/User_Logo';
                    $url = $destinationPath . "/" . $name;
                    $files->move($destinationPath, $name);
                    $updUser->logo = $name;
                }

                $updUser->save();

                session()->flash('type', 'success');
                session()->flash('message', 'Successfully update user...!');
                return redirect()->back();
            } else{
                session()->flash('type', 'danger');
                session()->flash('message', 'something went wrong to update user. please try again....!');
                return redirect()->back();
            }

        } catch (\Exception $e) {
            session()->flash('type', 'danger');
            session()->flash('message', 'something went wrong to update user. please try again....!');
            return redirect()->back();
        }
    }



    /*delete user*/
    public function delete($id)
    {
        try{
            if(Auth::id()!=$id){

                User::where('id', $id)->delete();
                session()->flash('type', 'success');
                session()->flash('message', 'Successfully deleted user...!');
                return redirect()->back();

            }else{
                session()->flash('type', 'danger');
                session()->flash('message', 'You can\'t delete your account.....!');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            session()->flash('type', 'danger');
            session()->flash('message', 'something went wrong to delete user. please try again....!');
            return redirect()->back();
        }
    }


}
