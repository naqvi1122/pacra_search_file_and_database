<?php

namespace App\Http\Controllers;
use App\Models\Og_user;
use Illuminate\Http\Request;

class JointableController extends Controller
{
    //
    // function index(){

    //     $data = Og_user::join('og_companies','og_companies.id','=','og_users.id')
    //     ->get(['og_companies.name','og_users.email','og_users.username']);
    //     return view('jointable', compact('data'));
    // }
}
