<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::get();

        return view('member-detail',['members'=>$members]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'assignee_code' => 'required | digits:2',
            'name' =>[
                'required',
                'regex:/^[\pL\s]+$/u',
                'max:50',
            ],
            // alpha:ascii (for user only)
            'mobile' => 'required | digits:10 | numeric | unique:members,mobile',
            'email' => ' email|required | unique:members,email',
            'password' => [
                'required',
                'confirmed',
                'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            ],
            
            'image' => 'required | mimes:jpg,png',
            'role' => [
                'required',
                Rule::in(['Clerk', 'Manager', 'Supervisor', 'Devloper', 'Other']),
            ],
           
        ]);

        $member = new Member;
        $member->assignee_code = $request->assignee_code;
        $member->name = $request->name;
        $member->mobile = $request->mobile;
        $member->email = $request->email;
        $member->password = $request->password;
        $member->password_confirmation = $request->password_confirmation;


        $imageName = Carbon::now()->timestamp. '.' . $request->image->extension();
        $request->image->storeAs('public/members', $imageName);
        $member->image = $imageName;


        
        $member->role = $request->role;
        $member->check = $request->check;
        $member->save();
        
        return redirect('/dashboard');
        //session()->flash('message', 'data inserted successfully!');
        if($member){
            return "data inserted!";
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member, $id)
    {
        $member = Member::find($id);
        return view('update', ['member'=>$member]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Member $member)
    {
        $imageName = '';


        $request->validate([
            'assignee_code' => 'required | digits:2',
            'name' =>[
                'required',
                'regex:/^[\pL\s]+$/u',
                'max:50',
            ],
            // alpha:ascii (for user only)
            'mobile' => 'required | digits:10 | numeric',
            'email' => ' email|required ',
            'password' => [
                'required',
                'confirmed',
                'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            ],
            
            'image' => 'image | mimes:jpg,png',

            // 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

             
            'role' => [
                'required',
                Rule::in(['Clerk', 'Manager', 'Supervisor', 'Devloper', 'Other']),   
            ],
           
        ]);

       //  print_r($request->all());
        $member = Member::find($request->id);
        $member->assignee_code = $request->assignee_code;
        $member->name = $request->name;
        $member->mobile = $request->mobile;
        $member->email = $request->email;
        $member->password = $request->password;
        $member->password_confirmation = $request->password_confirmation;


       
        if ($request->hasFile('image') && !empty($request->image)) {
            
            $imageName = Carbon::now()->timestamp. '.' . $request->image->extension();
            $request->image->storeAs('public/members', $imageName);
            if ($member->image) {
                Storage::delete('public/members/' . $member->image);
            }
        } else {
          $imageName = $member->image;
                    
        }
        $member->image = $imageName;

        
        $member->role = $request->role;
        $member->check = $request->check;
        $member->save();

        return redirect('/dashboard/member-detail');
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::find($id);
        $member->delete();
        return redirect('/dashboard/member-detail');
        if($member)
        {
            return "data deleted successfully!";
        }
    }
}
