<?php

namespace App\Http\Controllers\pages\users;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\user\StoreUser;
use App\Http\Requests\user\UpdateUser;

class UserProfileController extends Controller
{
    public function index()
    {
            $data = User::all();
            return view('pages.users.index', compact('data'));
    }


    public function create()
    {
        return view('pages.users.add');
    }


    public function store(StoreUser $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $target_data = User::create($data);
        $target_data->save();

        return back()->with('success', 'you added User succssefully');
    }


    public function show(User $user)
    {
        return view('pages.users.profile');
    }


    public function edit(User $user)
    {
            $data = User::where('id', $user->id)->first();
            return view('pages.users.edit', compact('data'));
    }


    public function update(UpdateUser $request, User $user)
    {
        $data = $request->all();
        $target_data = User::where('id', $user->id)->first();

        if ($request->password != '') :
            $data['password'] = Hash::make($request->password);
        else :
            $data = Arr::except($data, ['password']);
        endif;

        $target_data->update($data);

        return redirect('/users')->with('update', 'you updated User succssefully');
    }


    public function destroy(User $user)
    {
        $target_data = User::where('id', $user->id)->first();
        $target_data->delete();

        return redirect('/users')->with('delete', 'you deleted User succssefully');
    }
}
