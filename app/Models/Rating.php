<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Rating extends Model
{
    use HasFactory;

    protected $table = 'ratings';
    protected $fillable = [
        'comment'
    ];



    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

}
