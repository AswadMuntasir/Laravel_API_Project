<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobiles;

class TestController extends Controller
{
    public function index()
    {
        $mobiles = Mobiles::all();
        return response()->json([
            'status' => 'success',
            'mobiles' => $mobiles,
        ]);
    }
}
