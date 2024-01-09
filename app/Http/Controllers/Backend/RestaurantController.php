<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();
        return view('restaurant.index', compact('restaurants'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:restaurants',
            'description' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'type_cuisine' => 'required',
            'photo' => 'required|mimes:jpg,jpeg,png',
        ]);

        Restaurant::create($request->all());
        return redirect()->route('restaurant.index')
            ->with('success', 'Restaurant created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:restaurants,name,' . $id,
            'description' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'type_cuisine' => 'required',
            'photo' => 'required|mimes:jpg,jpeg,png',
        ]);

        $restaurant = Restaurant::find($id);
        $restaurant->update($request->all());
        return redirect()->route('restaurant.index')
            ->with('success', 'Restaurant updated successfully.');
    }

    public function destroy($id)
    {
        $restaurant = Restaurant::find($id);
        $restaurant->delete();
        return redirect()->route('restaurant.index')
            ->with('success', 'Restaurant deleted successfully');
    }

    public function create()
    {
        return view('restaurant.create');
    }

    public function show($id)
    {
        $restaurant = Restaurant::find($id);
        return view('restaurant.show', compact('restaurant'));
    }

    public function edit($id)
    {
        $restaurant = Restaurant::find($id);
        return view('restaurant.edit', compact('restaurant'));
    }
}











/*
class RestaurantController extends Controller
{
    public function AllRestaurant()
    {
        $restaurants = Restaurant::latest()->get();
        return view('backend.restaurant.all_restaurant', compact('restaurants'));
    }//end of AllRestaurants

    public function AddRestaurant()
    {

        return view('backend.restaurant.add_restaurant');
    }//end of AddRestaurant

    public function EditRestaurant($id)
    {
        $restaurant = Restaurant::findorfail($id);
        return view('backend.restaurant.edit_restaurant', compact('restaurant'));
    }//end of Edit method"

    public function DeleteRestaurant($id)
    {
        $restaurant = Restaurant::find($id);
        $restaurant->delete();

        // Message de notification
        $notification = [
            'message' => 'Restaurant supprimé avec succès',
            'alert-type' => 'success'
        ];

        // Redirection avec notification
        return redirect()->route('all.restaurant')->with($notification);
    }//end of Delete method"

    public function Store(Request $request)
    {
        // Validation des données de la requête
        $request->validate([
            'name' => 'required|unique:restaurants',
            'description' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'type_cuisine' => 'required',
            'photo' => 'required|mimes:jpg,jpeg,png',
        ]);

        //traitements de l'image
        $file_name = time() . '.' . request()->photo->getClientOriginalExtension();
        request()->photo->move(public_path('upload/restaurant_images'), $file_name);

        // Insertion du restaurant avec l'ID de l'utilisateur connecté
        Restaurant::create([
            'user_id' => $request->user()->id, // Ajout de l'ID de l'utilisateur connecté
            'name' => $request->name,
            'description' => $request->description,
            'phone' => $request->phone,
            'address' => $request->address,
            'type_cuisine' => $request->type_cuisine,
            'photo' => $file_name ?? null,
        ]);

        // Message de notification
        $notification = [
            'message' => 'Restaurant créé avec succès',
            'alert-type' => 'success'
        ];

        // Redirection avec notification
        return redirect()->route('all.restaurant')->with($notification);
    } // Fin de la méthode Store

    public function update_restaurant(Request $request, $id)
    {
        return view('backend.restaurant.all_restaurant');
    }
}
*/
