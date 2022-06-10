<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
  public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites', 'user_id', 'item_id');
    }
}
