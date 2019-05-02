<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
class LocationController extends Controller
{
    public function create(Request $request)
    {
        $location = new Location();
        $location->id = $this->generateUuid();
        $location->province = $request->input('province');
        $location->city = $request->input('city');
        $location->street = $request->input('street');
        $location->zip_code = $request->input('zip_code');
        $location->address = $request->input('address');

        if ($location->save()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Save Item Failed'
            ]);
        }
    }
}
