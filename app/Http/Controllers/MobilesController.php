<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobiles;

class MobilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $mobiles = Mobiles::all();
        return response()->json([
            'status' => 'success',
            'mobiles' => $mobiles,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'storage' => 'required|string|max:255',
            'price' => 'required',
        ]);

        $mobile = Mobiles::create([
            'name' => $request->name,
            'brand' => $request->brand,
            'color' => $request->color,
            'storage' => $request->storage,
            'price' => $request->price,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Mobile created successfully',
            'mobile' => $mobile,
        ]);
    }

    public function show($id)
    {
        $mobile = Mobiles::find($id);
        return response()->json([
            'status' => 'success',
            'mobile' => $mobile,
        ]);
    }

    public function mobileFilter(Request $request)
    {
        if ($request->storage != "" || $request->storage != null) {
            $mobiles = Mobiles::where ('storage', '=', $request->storage)->get();
            return response()->json([
                'status' => 'success',
                'mobiles' => $mobiles,
            ]);
        }
        if ($request->color != "" || $request->color != null) {
            $mobiles = Mobiles::where ('color', '=', $request->color)->get();
            return response()->json([
                'status' => 'success',
                'mobiles' => $mobiles,
            ]);
        }
    }
}
