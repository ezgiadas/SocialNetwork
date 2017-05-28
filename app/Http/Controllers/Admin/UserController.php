<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Support\Facades\Storage;

use App\User;
use Validator;



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
        // Validate input fields
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required|email',
            'about_me' => 'max:200',
            'profile_pic' => 'max:10000|mimes:jpg'
        ]);
 
        if ($validator->fails()) {
            return redirect()->route('admin.user.edit', ['id' => $user->id])
                        ->withErrors($validator)
                        ->withInput();
        }
 
        $user->update($request->all());

        // retrieve checkbox values and change their value for database
        $is_admin = isset($request['is_admin']) ? 1 : 0;
        $is_mod = isset($request['is_mod']) ? 1 : 0;
        $is_private = isset($request['is_private']) ? 1 : 0;

        if ($request->hasFile('profile_pic')) {
            $file = $request->file('profile_pic');

            // generate a user specific filename
            $filename = $user->id . "_" . $user->username .  "."  . $file->getClientOriginalExtension();

            // replace old profil picture by new one.
            self::deleteProfilePicture($user);
            $file = $file->move(public_path('/images/profile/'), $filename);

            $path = '/images/profile/' . $filename;
            $user->update(['profile_pic' => $path]);
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
        self::deleteProfilePicture($user);
        return redirect()->route('admin.user.show');
    }

    public function deleteProfilePicture(User $user)
    {
        $picture = glob(public_path('/images/profile/') . $user->id . "_" . $user->username . '.*');

        if (!empty($picture) && file_exists($picture[0])) {
            unlink($picture[0]);                                
        }
    }
}
