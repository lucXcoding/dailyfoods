<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Restaurant;
use App\Models\Dishe;

class ManagerController extends Controller
{
    public function ManagerDashboard()
    {
        return view('manager.index');
    }//end of ManagerDashboard


    public function ManagerProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('manager.profile', compact('profileData'));
    }//end of ManagerProfile

    public function ManagerprofileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->adress = $request->adress;
        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/manager_images/' . $data->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/manager_images'), $filename);
            $data['photo'] = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('manager.profile')->with($notification);
    }//end of ManagerprofileStore

    //function qui permet de recuperer les restaurants du manager
    public function ManagerRestaurants()

        {
            $managerId = Auth::user()->id;
            $restaurant = Restaurant::where('manager_id', $managerId)->first();
            return view('manager.restaurant.show', compact('restaurant'));
        }


        // function qui permet de creer un restaurant
    public function CreateRestaurant(Request $request)
    {
        $id = Auth::user()->id;
        $restaurant = Restaurant::where('manager_id', $id)->first();
        Restaurant::create([
            'slug' => $request->input('slug'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'type_cuisine' => $request->input('type_cuisine'),
            'photo' => $request->input('photo'),


        ]);
        return redirect()->route('manager.dashboard')->with('success', 'Restaurant Added Successfully');
    }//end of CreateRestaurant
}
