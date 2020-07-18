<?php

namespace App\Http\Controllers\Api\MyController;

use App\Contact;
use App\Group as Group;
use App\Http\Controllers\Controller;

use App\UserContactGroup;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HomeController extends BaseController
{

    public function index()
    {
        $group = Group::all();
        return $this->sendResponse($group, 'group retrieved successfully.');
    }

    public function addGroup(Request $request){

        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'user_id'=>'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $group= new Group();
        $group->name=$request->name;
        $group->user_id=$request->user_id;
        if($group->save()){
            return $this->sendResponse($group, 'group inserted successfully.');
        }

    }

    public function addContact(Request $request){

        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'address'=>'required',
            'phone'=>'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        try {
            $contact = new Contact();
            $contact->name=$request->name;
            $contact->phone=$request->phone;
            $contact->address=$request->address;
            $contact->save();
        }catch (QueryException $e){
            return $e;
        }

        $contact_group=new UserContactGroup();
        if ($request->group==''){
            if (!Group::where('user_id',Auth::user()->id)->first()){
                $group=new Group();
                $group->name='Oбщая группа';
                $group->user_id=Auth::user()->id;
                $group->save();
            }
            $contact_group->group_id=$group->id;
        }else{
            $contact_group->group_id=$request->group;
        }
        $contact_group->contact_id=$contact->id;
        if($contact_group->save()){
            return $this->sendResponse($group, 'contact inserted successfully.');
        }
        return $this->sendError( 'Something Error!');
    }

}
