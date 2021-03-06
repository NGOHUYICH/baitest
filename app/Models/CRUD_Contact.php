<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CRUD_Contact extends Model
{
    use HasFactory;
    protected $table = "contact";
    protected $filetable = ['name','address','email','content'];

    public function UserLogin()
    {
        return $this->hasMany('App\userNguoi','created_by','id');
    }

}
