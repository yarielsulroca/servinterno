<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Role;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function role (){
        return $this->belongsTo(Role::class,'id_role');
    }
    static function idName($id){
        if(User::find($id))
        {
            $usuario=User::find($id);
            return $usuario->name;
        }
        else return "No existe este Usuario";

    }

    public function roleName($id_role){
        if(Role::where('id',$id_role)->first())
        {
            $role =Role::where('id',$id_role)->first();
            return $role;
        }
        return "No existe ese rol";
    }
}