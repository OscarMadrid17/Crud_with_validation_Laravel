<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['Clients'] = Client::paginate(5);
        return view('clients.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {


        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $ClientData)
    {
        $ClientData->validate([
            'name'      =>  'required|string|min:3',
            'email'     =>  'required|string|email|max:250|unique:clients',
            'password'  =>  'required|string|min:8|max:250'
        ]);
        $ClientData = request()->except('_token');
        Client::insert($ClientData);
        // return response()->json($ClientData);

        return redirect()->route('index')->with('message','usuario creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $ClientData, $id)
    {
        $ClientData->validate([
            'name'      =>  'required|string|min:3',
            'email'     =>  'required|string|email|max:250|unique:clients',
            'password'  =>  'required|string|min:8|max:250'
        ]);

        $ClientData = request()->except(['_token','_method']);
        Client::where('id','=',$id)->update($ClientData);

        $client = Client::findOrFail($id);
        return view('clients.edit',compact('client'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Client::destroy($id);

        return redirect()->route('index')->with('message','usuario eliminado con exito');
    }
}
