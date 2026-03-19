<?php

namespace App\Models\Contracts;

use Illuminate\Database\Eloquent\Model as BaseModel;

abstract class Model extends BaseModel
{
    public function getPrimaryKey(): string
    {
        return 'id';
    }
}
