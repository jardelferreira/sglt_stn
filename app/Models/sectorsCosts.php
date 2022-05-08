<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sectorsCosts extends Model
{
    use HasFactory;

    protected $table = 'cost_sectors';

    protected $fillable = ['name','amount','cost_center_id'];
}
