<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicData extends Model
{
   use HasFactory;

   /**
     * guarded
     *
     * @var array
     *
     */

   protected $table = 'basic_data';
   protected $guarded = [];

   public function fileReference()
   {
      return $this->hasOne(FileReference::class);
   }
}
