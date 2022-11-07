<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BasicData;
use App\Models\FileReference;

class DataController extends Controller
{
    public function getFile($reference)
    {
        return BasicData::find($reference)->fileReference;
    }

    public function getBasicData($id)
    {
        return FileReference::find($id)->basicData;
    }
}
