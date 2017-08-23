<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = ['service', 'service_id', 'name', 'nickname'];

    public function userExists($service_id)
    {
        $user = $this->where('service', 'twitter')
            ->where('service_id', $service_id)
            ->get();

        if (count($user) == 0) {
            return false;
        }
        return true;

    }

}
