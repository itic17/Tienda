<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Validator;
use Inertia\Inertia;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class CategoriesController extends Controller
{
    public function show()
    {
        return Inertia::render('Categories/Show', [
            'categories' => Categories
                ::orderBy('id', 'desc')
                ->paginate(10)
        ]);
    }

    public function delete(Request $request)
    {
        $category = Categories::find($request->input('category'));
        $category->delete();
        return back(303);
    }

    public function edit(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'description' => 'required'

        ]);

        $category = Categories::find($request->input('category'));

        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->save();

        return Redirect::route('categories');
    }

    public function add(Request $request)
    {

        request()->validate([
            'name' => 'required',
            'description' => 'required'

        ]);

        $category = new Categories();
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->save();

        return Redirect::route('categories');
    }
}
