<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use App\User;


class UserController extends Controller
{

    public function useraccount() {
        return view('useraccount', ['user'=> Auth:user()]);
    }

    public function saveaccount(Request $request) {
      $this->validate($request, [
          'name' => 'required|string|max:255',
          'email' => 'required|string|email|max:255|unique:users',
       ]);

        $user = Auth::user();
        $old_name = $user->name;
        $user->name = $request['name'];

        $old_email = $user->email;
        $user->email = $request['email'];
        $user->update();

        return redirect()->route('useraccount');
    }

}
