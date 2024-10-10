<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Providers\AppServiceProvider;
use App\Models\Tbluser;
use App\Models\City;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;
use Session;

// use Illuminate\Support\Facades\Session;

class usercontroller extends Controller
{
        public function formview(){
        
                // $demo = "Cdmi";
                // Session::set('dipali',$demo);

                $city = City::all();
              return view('form',compact('city'));
        }
        public function create(Request $request){
        $hobby = $request->checkbox;
        $hb_str = implode("," ,  $hobby);

        if($request->img)
        {
                $image = $request->img;
                $filename = time().$image->getClientOriginalName();
                $image->move(public_path('image/'),$filename);
        }
        if(isset($request->submit))  
        {   
            $arr= Tbluser::updateOrCreate(
                [
                   'id'=>$request->id
                ],[
              'name'=>$request->name,
              'gender'=>$request->gender,
              'checkbox'=>$hb_str,
              'city'=>$request->city,
              'img'=>$filename
          ]);
        }
        return redirect()->back();
}
 public function viewdata($req)
 {
           $city = City::all();
           $search = $req->search;
           $data=Tbluser::where('name' ,'LIKE' ,"%$search%")->paginate(5);
           return view('viewdata' ,compact('data'));
 }

 public function edit($id)
 {
          $city=City::all();
          $edit =Tbluser::find($id);
          $hb = explode("," , $edit->checkbox);
          return view('form' ,compact('edit','hb' ,'city'));
          
 }
 public function delete($id)
 {
           $deleterecord= Tbluser::find($id);
           $deleterecord->delete();      
           return redirect() -> route('viewdata');
 }
 
}
