<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Constituency;
use App\Models\District;
use App\Models\GpDetail;
use App\Models\PlayerDetail;
use App\Models\User;
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
        'data'    => $information,
    ], 200);
   }

   public function sendUserInfo(){

    $authUserId = auth()->user()->id;

    try{

        $userInfo = User::query()
            ->where('id', $authUserId)
            ->first();
        $is_record = PlayerDetail::where('user_id',$authUserId)->count();
        if($is_record>0){
            return response()->json([
                'status' => true,
                'message' => 'Record Found',
                'data' => $userInfo
            ], 200);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'Record Not Found'
            ], 404);
        }

    } catch (\Throwable $th) {
        return response()->json([
            'status' => false,
            'message' => $th->getMessage()
        ], 500);
    }

}
}
