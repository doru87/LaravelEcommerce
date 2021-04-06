<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }

   public function index() {
    if(Session()->has('user')){
   
        $name = Session()->get('user')['name'];
        $fullname = explode(" ",$name);
        $firstname = $fullname[1];
        $lastname = $fullname[0];
        $email = Session()->get('user')['email'];
        $password = Session()->get('user')['password'];
        $profile = Profile::where('email',$email)->get();
    
        foreach ($profile as $key => $value) {
            $address = $value->address;
            $city = $value->city;
            $country = $value->country;
            $file = $value->picture;
        }
        $address = isset($address) ? $address: "";
        $city = isset($city) ? $city: "";
        $country = isset($country) ? $country: "";
        $file = isset($file) ? $file: "";

    }
    
       return view('profile')->with(compact('firstname','lastname','email','password','address','city','country','file'));
   }

   public function changeProfile(Request $request){

    $profilecollection = Profile::where('email',Session()->get('user')['email'])->get();
    if($profilecollection->isNotEmpty()){

        if($request->hasFile('image_profile')){
            $email = Session()->get('user')['email'];
            $file = $request->file('image_profile')->getClientOriginalName();
            $request->file('image_profile')->storeAs('/public/profile_images/'.$email,$file);
            $profilecollection = Profile::where('email',Session()->get('user')['email'])->get();
            
            $filename="";
                foreach($profilecollection as $profile){
                    $profile->picture = $file;
                    $profile->save();
                    $filename = $profile->picture;
                }
            $filesInFolder = File::files('../storage/app/public/profile_images/'.$email);  

                foreach($filesInFolder as $path) { 
                    $file = pathinfo($path);
                    array_push($array_files,$file['basename']);
                } 
                $files_to_delete = array_diff($array_files,array($filename));

                foreach($files_to_delete as $file) { 
                    Storage::delete('public/profile_images/'.$email.'/'.$file);
                }
        }
        
    foreach($profilecollection as $profile){
        $profile->name = $request->lastname." ".$request->firstname;
        $profile->email = $request->email;
        $hashedPassword = Session()->get('user')['password'];
            if (Hash::check($request->current_password, $hashedPassword)) {
                $profile->password = Hash::make($request->new_password);
            }else{
                $profile->password = $hashedPassword;
            }
        $profile->address = $request->address;
        $profile->city = $request->city;
        $profile->country = $request->country;
        $profile->save();
    }

    $firstname ="";
    $lastname ="";
    $email ="";
    $password ="";

    foreach($profilecollection as $profile){
        $fullname = explode(" ",$profile->name);
        $firstname = $fullname[1];
        $lastname = $fullname[0];
        $email = $profile->email;
        $password = $profile->password;
        $address = $profile->address;
        $city = $profile->city;
        $country = $profile->country;
        $file = $profile->picture;
    }
    

    $address = isset($address) ? $address: "";
    $city = isset($city) ? $city: "";
    $country = isset($country) ? $country: "";
    $file = isset($file) ? $file: "";

    return view('profile')->with(compact('firstname','lastname','email','password','address','city','country','file'));

    }

    }

}
