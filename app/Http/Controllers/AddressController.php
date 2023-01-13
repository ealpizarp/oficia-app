<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $addresses = DB::table('service')
                            ->join('address', 'address.id', '=', 'service.address_id')
                            ->select(DB::raw('count(service.name) as amount, address.id, address.name'))
                            ->groupBy(DB::raw('address.id, address.name'))
                            ->orderBy('amount', 'desc')
                            ->paginate(30);

        return view('address.index', ['addresses' => $addresses]);
    }

    public function addressByProvince(Request $request) 
    {
        $addresses = Address::where('province_id', '=', $request->id)->get();
        return response()->json([
            'status' => 1,
            'addresses' => $addresses
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addresses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'province_id' => 'required'
        ]);

        Address::create($formFields);
        return redirect()->route('addresses.index')->with(["mensaje" => "Dirección guardada"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     return view("addresses.edit", ["address" => $address]);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        $formFields = $request([
            'name' => 'required',
            'province_id' => 'required'
        ]);

        $address->update($formFields);
        
        return redirect()->route("addresses.index")->with(["mensaje" => ""]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        $address->delete();
        return redirect()->route('')->with([]);
    }
}
