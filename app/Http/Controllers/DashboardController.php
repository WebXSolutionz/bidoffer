<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\PropertyType;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function dashboard(){
        $page_data['title'] = 'Dashboard';
        return view('dashboard', $page_data);
    }

    public function settings(Request $request) {
        $page_data['title'] = 'Settings';
        $page_data['user'] = $user = Auth::user();
        $page_data['property_types'] = PropertyType::all();
        $page_data['countries'] = Country::all();
        $page_data['states'] = State::where('country_id', $user->country_id)->get();
        // dd($user->toArray());
        return view('settings',$page_data);
    }

    public function getStates(Request $request)
    {
        $country_id = $request->input('country_id');
        $states = State::where('country_id', $country_id)->get();
        return response()->json(['success'=>true,'states'=>$states]);
    }

    public function getCities(Request $request)
    {
        $state_id = $request->input('state_id');
        $cities = City::where('state_id', $state_id)->get();
        return response()->json(['success'=>true,'cities'=>$cities]);
    }

    public function saveSettings(Request $request)
    {
        $user = User::whereId(Auth::user()->id)->first();
        // $user->user_name = $request->username;
        $user->name = $request->name;
        if($request->password!="" && $request->password == $request->confirm_password)
        {
            $user->password = Hash::make($request->password);
        }
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->description = $request->description;
        $user->website = $request->website;
        $user->search_preferences = json_encode($request->search_preferences);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->language = $request->language;
        $user->country_id = $request->country_id;
        $user->state_id = $request->state_id;
        $user->address1 = $request->address1;
        $user->address2 = $request->address2;
        $user->town = $request->town;
        $user->zip = $request->zip;
        if($request->myavatar!="")
        {
            $user->avatar = $request->myavatar;
        }
        if($request->mycover!="")
        {
            $user->cover_photo = $request->mycover;
        }
        $user->save();

        // $user2 = User::whereId(Auth::user()->id)->first();
        if($request->avatar!="")
        {
            $ext = $request->avatar->extension();
            if(in_array(strtolower($ext), ['jpg','jpeg','png','gif','svg']))
            {
                $uuid = (string) Str::uuid();
                $imageName = $uuid.'.'.$ext;
                $request->avatar->move(public_path('images/avatar'), $imageName);
                $user = User::whereId(Auth::user()->id)->first();
                $user->avatar = $imageName;
                $user->save();
            }
        }

        if($request->cover_photo!="")
        {
            $ext = $request->cover_photo->extension();
            if(in_array(strtolower($ext), ['jpg','jpeg','png','gif','svg']))
            {
                $uuid = (string) Str::uuid();
                $imageName = $uuid.'.'.$ext;
                $request->cover_photo->move(public_path('images/cover'), $imageName);
                $user = User::whereId(Auth::user()->id)->first();
                $user->cover_photo = $imageName;
                $user->save();
            }
        }

        // $request->avatar
        // $request->cover_photo
        return redirect()->back()->with('success', 'Settings Saved Successfully!');
    }
}
