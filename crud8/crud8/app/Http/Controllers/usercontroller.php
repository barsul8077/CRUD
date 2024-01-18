<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;

class usercontroller extends Controller
{
  
//Add User    
    public function index() {
        return view('index');
    }

//View
    public function view_user() {
    //    $users= user::get(); 
        return view('view_user',['userf'=> user::latest()->paginate(5)]);
    }

//Edit
    public function edit_user($id) {
      $slc=user::where('id',$id)->first();
            return view('edit_user',['usered'=> $slc]);
        }

//Profile
        public function user_details($id) {
            $detl=user::where('id',$id)->first();
                  return view('user_details',['userdtl'=> $detl]);
              }

//Delete
        public function delete($id) {
            $del=user::where('id',$id)->first();
                  $del->delete();
                  return back()->withsuccess('Delted Sucssfully !!!!');
              }

//Update   
        public function update_user(Request $request,$id){
            $request->validate([
          
                'name' => 'required',
                'email' => 'required',
                'mobile' => 'required',
                'password' => 'required',
                'description' => 'required',
             
            ]);
            $user=user::where('id',$id)->first();
            if(isset($request->image)){
                $imageName = time().'.'.$request->image->extension();   
         
                $request->image->move(public_path('userimg'), $imageName);
                $user->image=$imageName;
            }
            // dd($request->all());

          
           
            $user->name=$request->name;
            $user->email=$request->email;
            $user->mobile=$request->mobile;
            $user->password=$request->password;
            $user->description=$request->description;
            $user->save();
            return back()->withsuccess('Edit User Sucssfully !!!!');
      
        }

//account Create
    public function store(request $request) {

        $request->validate([
          
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'password' => 'required',
            'description' => 'required',
        ]);
      
        // dd($request->all());
        $imageName = time().'.'.$request->image->extension();   
     
        $request->image->move(public_path('userimg'), $imageName);
        $user= new user;
        $user->image=$imageName;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->mobile=$request->mobile;
        $user->password=$request->password;
        $user->description=$request->description;
        $user->save();
        return back()->withsuccess('Add User Sucssfully !!!!');
  
    }

//Login
          public function login()
          {
              return view('login');
          }

          public function loginp(request $request)
          {
             $user=User::where('email',$request->input('email'))->where('password',$request->input('password'))->first();
             if($user){

                session()->put('id',$user->id);
                // session()->put('type',$user->type);
                return redirect('study' );
                // $user=user::where('id',$user->id)->first();
                // if($user->type=='customer'){
                //     return redirect('study' );
                // }

             }
             else{
                return redirect('login')->witherror('Your Id Invalid!!!!');
             }
          }

//Logout
          public function logout() {

            session()->forget('id');
            session()->forget('type');
            return redirect('login');
            
        }

//Login Account
            public function study() {
   
            return view('study');
        }
//header
        // public function header() {

        //     $session_id=session()->has('id');
        //     $rtiu = User::where('id', $session_id)->first();

        //     return view('header', compact('rtiu'));
           
        // }

}
