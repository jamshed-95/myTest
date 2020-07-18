<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Group;
use App\User;
use App\UserContactGroup;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{

    public function index(){
        return view('site.index');
    }

    public function home(Request $request){
       $contact= $group=Group::where('user_id',Auth::user()->id)->where('status',1);
       $group=$group->get();

        if ($request->has('search')){
            $contact = $contact->whereHas('contacts', function ($query) {
                $query->where('phone','like', '%'.request('search').'%');
            });
            $contact = $contact->whereHas('contacts', function ($query) {
                $query->where('name',request('search'));
            });

        }
        $contact=$contact->get();

        return view('site.home',['groups'=>$group,'contacts'=>$contact]);
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

    public function editGroup(Request $request){

      $this->validate($request,[
          'group'=>'required',
          'my_group'=>'required'
      ]);

        $group=Group::where('user_id',Auth::user()->id)->where('id',$request->my_group)->first();

        $group->name=$request->group;
        if ($group->save()){
            return back()->with('success','Группа редактировано!');
        }else{
            return back()->with('danger','Произашло Ошибка!');
        }
    }

    public function deleteGroup(Group $group){

        if ($group->user_id==Auth::user()->id){
            $group->status=0;
            $group->save();
            return back()->with('success','Группа удалено!');
        }

        return back()->with('danger','Произошла Ошибка!');
    }

    public function addContact(Request $request){

        $this->validate($request,[
            'name'=>'required',
            'phone'=>'required',
            'address'=>'required'
        ]);
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
            return back()->with('success','Контакт добавлен');
        }
        return back()->with('danger','Произошла ошибка!');
    }

    public function editContact(Request $request,Contact $contact){

        $this->validate($request,[
            'group'=>'required',
            'name'=>'required',
            'phone'=>'required'
        ]);

        $contact->name=$request->name;
        $contact->phone=$request->phone;
        $contact->address=$request->address;
        $contact->save();

        if(UserContactGroup::where('contact_id',$contact->id)
            ->update([
                        'group_id'=>$request->group
                    ])){
            return back()->with('success','Контакт успешно редактрован!');
        }
        return back()->with('danger','Произошла ошибка!');
    }

    public function deleteContact(Contact $contact){

       $contact->status=0;
       $contact->save();

        return back()->with('success',"Контакт $contact->name с номером $contact->phone  Удален!");

    }

    /*<ajax requests>*/
    public function getContactGroup(Group $group){
        $contacts=$group->contacts->where('status',1);
        $outp = "[";
        foreach ($contacts as $contact) {
            if ($outp != "[") {$outp .= ",";}
            $outp .= '{"id":"'.  $contact->id . '",';
            $outp .= '"name":"'.  $contact->name . '",';
            $outp .= '"phone":"' . $contact->phone . '",';
            $outp .= '"address":"' . $contact->address . '"}';
        }
        $outp .="]";

        echo $outp;

    }

    public function getContact(Contact $contact){

        $outp = "[";
            $outp .= '{"name":"'.  $contact->name . '",';
            $outp .= '"phone":"' . $contact->phone . '",';
            $outp .= '"address":"' . $contact->address . '"}';
        $outp .="]";

        echo $outp;

    }

    public function getGroup(Group $group){

       if ($group->user_id==Auth::user()->id){
           $outp = "[";
           $outp .= '{"id":"'.  $group->id . '",';
           $outp .= '"name":"' . $group->name . '"}';
           $outp .="]";

           echo $outp;
       }else{
           $outp = "[";
           $outp .= '{"id":"'.  null . '",';
           $outp .= '"name":"' . null . '"}';
           $outp .="]";

           echo $outp;
       }


    }
    /*</ajax requests>*/

}
