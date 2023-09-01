<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Constituency;
use App\Models\District;
use App\Models\GpDetail;
use Illuminate\Http\Request;

class getInformationController extends Controller
{
   public function info(){
      $district = District::get();
      $constituent = Constituency::get();
      $gp = GpDetail::get();
      $information = [
        'district'    => $district,
        'constituent' => $constituent,
        'information' => $gp,
      ];
      return response()->json([
        'status' => true,
        'message' => 'User Created Successfully',
        'token' => $user->createToken("API TOKEN")->plainTextToken
    ], 200);
   }
}
