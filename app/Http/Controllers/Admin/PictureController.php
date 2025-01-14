<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Picture;

class PictureController extends Controller
{
    public function destroy(Picture $picture)
    {
        $picture->delete();
        return '';
    }
}
