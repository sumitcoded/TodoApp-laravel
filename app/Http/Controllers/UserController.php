<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
public function upload(Request $request){

    $email=Auth::user()->email;
    if($request->hasFile('image')){
        $this->deleteoldimage();
        $filename=$request->image->getClientOriginalName();
        $request->image->storeAs('images',$filename,'public');
        User::whereEmail($email)->update(['avatar'=>$filename]);
//        $request->session()->flash('message','Image Uploaded Successfully!');
        return redirect('home')->with('message','Image Uploaded Successfully!');
    }
//    $request->session()->flash('error','Image Uploaded Failed!');
    return redirect('home')->with('error','Image Uploaded Failed!');


}
protected function deleteoldimage(){
    if(Auth::user()->avatar){
        Storage::delete('/public/images/'.Auth::user()->avatar);
    }
}
}
