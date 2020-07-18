<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Group;
use App\User;
use App\UserContactGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{

    public function index(){
        return view('site.index');
    }


    public function home(){
        $group=Group::where('user_id',Auth::user()->id)->get();

        return view('site.home',['groups'=>$group]);
    }


    public function addGroup(Request $request){

        $this->validate($request,[
            'group'=>'required'
        ]);

        $group = new Group();
        $group->name=$request->group;
        $group->user_id=Auth::user()->id;
        $group->save();
        return back();


    }

    public function addContact(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'phone'=>'required',
            'address'=>'required'
        ]);

        $contact = new Contact();
        $contact->name=$request->name;
        $contact->phone=$request->phone;
        $contact->address=$request->address;
        $contact->save();

        $contact_group=new UserContactGroup();
        $contact_group->contact_id=$contact->id;
        $contact_group->group_id=$request->group;
        $contact_group->save();
        return back();


    }

    public function getContact(Group $group){

        $contacts=$group->contacts;



        $outp = "[";
        foreach ($contacts as $contact) {
            if ($outp != "[") {$outp .= ",";}
            $outp .= '{"name":"'.  $contact->name . '",';
            $outp .= '"phone":"' . $contact->phone . '",';
            $outp .= '"address":"' . $contact->address . '"}';
        }
        $outp .="]";

        echo $outp;

    }

}
