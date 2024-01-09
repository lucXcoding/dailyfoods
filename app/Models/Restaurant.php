<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function admin()
    {
        return $this->belongsTo(User::class, 'manager');
    }
    public function dateFormated()
    {
        return date_format(new \DateTime($this->created_at), 'd-m-Y');
    }
    public function createRestaurant($request)
    {
        $this->name = $request->name;
        $this->adress = $request->adress;
        $this->phone = $request->phone;
        $this->manager = $request->manager;
        $this->description = $request->description;
        $this->photo = $request->photo;
        $this->save();
    }
}
