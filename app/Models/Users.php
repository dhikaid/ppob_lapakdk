<?php

namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
{

    protected $table      = 'users';
    protected $primaryKey = 'uuid';
    protected $useAutoIncrement = false;
    protected $allowedFields = ['uuid', 'username', 'email', 'password', 'nohp', 'gambar'];
    protected $useTimestamps = true;


    public function checkUsername($username)
    {
        return $this->where(['username' => $username])->first();
    }

    public function getUserByUUID($uuid)
    {
        return $this->where(['uuid' => $uuid])->first();
    }
}
