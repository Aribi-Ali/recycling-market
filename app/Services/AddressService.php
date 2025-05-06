<?php

namespace App\Services;

use App\Http\Resources\AddressResource;
use Illuminate\Support\Facades\Auth;

class AddressService{

    public function getUserAddresses(){
        return AddressResource::collection(Auth::user()->addresses()->latest()->get());
    }

    public function create($data){
        Auth::user()->addresses()->create($data);
    }

    public function setDefault($addressId){
        $user = auth()->user();
        // Set all addresses of the user to not default
        $user->addresses()->update(['is_default' => false]);

        // Set the selected one to default
        $address = $user->addresses()->findOrFail($addressId);
        $address->is_default = true;
        $address->save();
    }

    public function delete($addressId){
        $address = Auth::user()->addresses()->findOrFail($addressId);
        $address->delete();
    }
}
