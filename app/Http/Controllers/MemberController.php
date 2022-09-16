<?php

namespace App\Http\Controllers;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
 function index($id)
    {
        $contacts= Member::with('getCompany')->find($id);
        return view ('profile',compact('contacts'));
    }
    public function contactlist()
    {
        $contact=Member::all();
        return view ('view',['contact' => $contact]);
    }
}
