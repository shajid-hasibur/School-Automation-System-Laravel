<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserPermission;

class userPremissionController extends Controller
{
    public function UserRole(){
        $userType = User::groupBy('usertype')->select('usertype')->get();

        $permissions = UserPermission::orderBy('role_name', 'ASC')->get();

        return view('backend.user.role_user', ['userType'=>$userType, 'permissions'=>$permissions]);

        
    }


    public function userPermission(Request $request){
        $userType = UserPermission::find($request->permission_id);

       $userType->dashboard = $request->dashboard ? 1 : 0;
       $userType->manage_profile = $request->manage_profile ? 1 : 0;
       $userType->setup_management = $request->setup_management ? 1 : 0;
       $userType->student_management = $request->student_management ? 1 : 0;
       $userType->employee_management = $request->employee_management ? 1 : 0;
       $userType->mark_management = $request->mark_management ? 1 : 0;
       $userType->account_management = $request->account_management ? 1 : 0;
       $userType->result = $request->result ? 1 : 0;
       $userType->report = $request->report ? 1 : 0;
       $userType->updated_at = now();
       $userType->save();


     


       return response()->json([
            'status'=>'success',
            'message' => 'updated successfully'

       ]);
    }
}
