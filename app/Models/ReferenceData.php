<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferenceData extends Model
{
    use HasFactory;

    protected $table = "reference_data";

    protected $guarded = [];
}
