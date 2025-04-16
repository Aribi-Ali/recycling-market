<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Models\Address;
use App\Services\AddressService;
use Illuminate\Http\Request;

class AddressController extends Controller{

    protected $addressService;

    public function __construct(AddressService $addressService){
        $this->addressService = $addressService;
    }

    public function index(){
        $addresses = $this->addressService->getUserAddresses();
        return view('addresses.index', compact('addresses'));
    }

    public function store(AddressRequest $request){
        $this->addressService->create($request);
        return back()->with('success', 'Address has been created!');
    }

    public function setDefault(Address $address){
        $this->addressService->setDefault($address);
        return back()->with('success', 'Address has been changed!');
    }

    public function destroy(Address $addressId){
        $this->addressService->delete($addressId);
        return back()->with('success', 'Address has been deleted!');
    }
}
