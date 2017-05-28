<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'is_admin', 'is_mod', 'is_private', 'profile_pic', 'about_me'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function deleteProfilePicture()
    {
        $picture = glob(public_path('/images/profile/') . $this->id . "_" . $this->username . '.*');
        if (!empty($picture) && file_exists($picture[0])) {
            unlink($picture[0]);                                
        }
    }
}
