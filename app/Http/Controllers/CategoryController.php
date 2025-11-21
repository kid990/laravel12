<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $categories=Category::all();
        return view('dashboard.category.index',compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title'=>'required|min:3',
            'slug'=>'required|min:3|unique:categories'
        ]);

        Category::create($request->all());
        return redirect()->route('categories.index')->with('success','Categoria creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
        return view('dashboard.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    
        return view('dashboard.category.edit', compact('category'));

          
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
         $request->validate([
            'title'=>'required|min:3',
            'slug'=>'required|min:3|unique:categories,slug,'.$category->id
        ]);

        $category->update($request->all());
        return redirect()->route('categories.index')->with('success','Categoria actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //

        $category->delete();
        return redirect()->route('categories.index')->with('success','Categoria eliminada exitosamente');
    }
}
