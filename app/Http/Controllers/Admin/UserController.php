<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Support\Facades\Storage;

use App\User;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return redirect()->route('admin.user.show');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // Get all users 
        $users = User::where('username', 'LIKE', $request->input('username').'%');
        
        if ($request->input('date') != '') {
            $users = $users->whereDate('created_at', '=', $request->input('date'));
        }
        $users = $users->paginate(10);
        $request->flash();
        return view('admin.user.index')->withUsers($users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit')->withUser($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        $is_admin = isset($request['is_admin']) ? 1 : 0;
        $is_mod = isset($request['is_mod']) ? 1 : 0;
        $is_private = isset($request['is_private']) ? 1 : 0;

        // TODO: Create a user specific name, and delete old picture (override?)
        if ($request->has('profile_pic')) {
            $file = $request->file('profile_pic');
            $filename = $file->getClientOriginalName();
            $file = $file->move(public_path('images/profil/'), $filename);

            $path = '/images/profil/' . $filename;
            $user->update(['is_admin' => $is_admin, 'is_mod' => $is_mod, 'is_private' => $is_private, 'profile_pic' => $path]);
        }

        $user->update(['is_admin' => $is_admin, 'is_mod' => $is_mod, 'is_private' => $is_private]);
        return view('admin.user.edit')->withUser($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.user.show');
    }
}
