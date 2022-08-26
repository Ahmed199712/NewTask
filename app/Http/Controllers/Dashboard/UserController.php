<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id','DESC')->get();

        return view('Dashboard.pages.users.index' , compact('users'));
    }

    public function create()
    {
        return view('Dashboard.pages.users.create');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'phone' => 'required|min:10|max:15',
            'password' => 'required',
            'password_confirmation' => 'required_with:password|same:password',
            'avatar' => 'nullable|image|mimes:png,jpg,jpeg,gif'
        ]);
        $user = new User;
        if( $request->avatar ){
            Image::make($request->avatar)->resize(null, 400, function ($constraint) {
                $constraint->aspectRatio();
            })->save('uploads/avatars/users/' . $request->avatar->hashName());
            $user->avatar = 'uploads/avatars/users/' . $request->avatar->hashName();
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->status = 1;
        $user->last_login_date = '-----';
        $user->last_logout_date = '-----';
        $user->password = bcrypt($request->password);
        $user->created_by = adminurl()->id;
        $user->save();

        session()->flash('success', trans('backend.created_successfully'));
        return redirect()->back();
    }

    
    public function show(User $user)
    {
        return view('Dashboard.pages.users.show' , compact('user'));
    }

    
    public function edit(User $user)
    {
        return view('Dashboard.pages.users.edit' , compact('user'));
    }

    
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phone' => 'required|min:10|max:15',
            'password' => 'nullable',
            'password_confirmation' => 'nullable|same:password',
            'avatar' => 'nullable|image|mimes:png,jpg,jpeg,gif'
        ]);

        if( $request->avatar ){
            if( $user->avatar != 'uploads/avatars/users/default.png' ){
                unlink($user->avatar);
            }
            Image::make($request->avatar)->resize(null, 400, function ($constraint) {
                $constraint->aspectRatio();
            })->save('uploads/avatars/users/' . $request->avatar->hashName());
            $user->avatar = 'uploads/avatars/users/' . $request->avatar->hashName();
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->updated_by = adminurl()->id;
        if( !empty($request->password) ){
            $user->password = bcrypt($request->password);
        }
        $user->save();

        session()->flash('success', trans('backend.updated_successfully'));
        return redirect()->back();
    }

    
    public function destroy(User $user)
    {
        if( $user->avatar != 'uploads/avatars/users/default.png' ){
            unlink($user->avatar);
        }
        $user->delete();

        session()->flash('success', trans('backend.deleted_successfully'));
        return redirect()->back();
    }

    public function activation(User $user)
    {
        if( $user->status == 1 ){
            $user->status = 0;
            $user->save();
            session()->flash('success', trans('backend.record_disabled_successfully'));
            return redirect()->back();
        }else{
            $user->status = 1;
            $user->save();
            session()->flash('success', trans('backend.record_actived_successfully'));
            return redirect()->back();
        }
        
    }
}
