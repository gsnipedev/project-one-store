<?php

namespace App\Entities;

use CodeIgniter\Entity;

class ItemsAPI extends Entity
{
    public function setPassword(string $pass)
    {
        $this->attributes['password'] = password_hash($pass, PASSWORD_BCRYPT);

        return $this;
    }
}