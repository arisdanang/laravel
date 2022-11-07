<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileReference extends Model
{
    use HasFactory;

    protected $table = 'file_references';
    protected $fillable = [
        'name',
        'basic_data_id'
    ];

    public function basicData()
    {
        return $this->belongsTo(BasicData::class);
    }
}
