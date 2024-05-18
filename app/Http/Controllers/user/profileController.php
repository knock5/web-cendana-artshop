<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\users;
use Illuminate\Support\Facades\Auth;
class profileController extends Controller
{
    //
    public function user()
    {
        $id = Auth::user()->USER_ID;
        $user = Users::findOrFail($id);
        return view('user.profile',compact('user'));
    }

    public function admin()
    {
        $id = Auth::user()->USER_ID;
        $user = Users::findOrFail($id);
        return view('admin.profile',compact('user'));
    }
}
