<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Providers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ProvidersController extends Controller
{
    public function show()
    {
        return Inertia::render('Providers/Show', [
            'providers' => Providers::with('product')
                ->orderBy('id', 'desc')
                ->paginate(10)
        ]);
    }

    public function delete(Request $request)
    {
        $provider = Providers::find($request->input('provider'));
        $provider->delete();
        return back(303);
    }

    public function edit(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required'

        ]);

        $provider = Providers::find($request->input('provider'));

        $provider->name = $request->input('name');
        $provider->phone = $request->input('phone');
        $provider->email = $request->input('email');
        $provider->address = $request->input('address');
        $provider->save();

        return Redirect::route('providers');
    }

    public function add(Request $request)
    {

        request()->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'product' => 'required|numeric'

        ]);

        $provider = new Providers();
        $provider->name = $request->input('name');
        $provider->phone = $request->input('phone');
        $provider->email = $request->input('email');
        $provider->address = $request->input('address');
        $provider->products_id = $request->input('product');
        $provider->save();

        return Redirect::route('providers');
    }
}
