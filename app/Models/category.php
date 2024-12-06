<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $fillable = ['name'];

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
