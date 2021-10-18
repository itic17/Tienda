<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Variants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class VariantsController extends Controller
{
    public function show()
    {
        return Inertia::render('Variants/Show', [
            'variants' => Variants::with('product')
                ->orderBy('id', 'desc')
                ->paginate(10)
        ]);
    }

    public function delete(Request $request)
    {
        $variant = Variants::find($request->input('variant'));
        $variant->delete();
        return back(303);
    }

    public function edit(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'description' => 'required'
            //'product' => 'required|numeric'
        ]);

        $variant = Variants::find($request->input('variant'));

        $variant->name = $request->input('name');
        $variant->description = $request->input('description');
        //$variant->products_id = $request->input('product');
        $variant->save();

        return Redirect::route('variants');
    }

    public function add(Request $request)
    {

        request()->validate([
            'name' => 'required',
            'description' => 'required',
            'product' => 'required|numeric'

        ]);

        $variant = new Variants();
        $variant->name = $request->input('name');
        $variant->description = $request->input('description');
        $variant->products_id = $request->input('product');
        $variant->save();

        return Redirect::route('variants');
    }
}
