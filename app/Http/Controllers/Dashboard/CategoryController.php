<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index()
    {
        $categories = Category::all();

        return view('Dashboard.pages.categories.index' , compact('categories'));
    }

    
    public function create()
    {
        return view('Dashboard.pages.categories.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|min:3'
        ]);
        $category = new Category;
        $category->name = $request->name;
        $category->created_by = adminurl()->id;
        $category->save();

        session()->flash('success', trans('backend.created_successfully'));
        return redirect()->back();
    }

   
    public function show(Category $category)
    {
        return view('Dashboard.pages.categories.show' , compact('category'));
    }

   
    public function edit(Category $category)
    {
        return view('Dashboard.pages.categories.edit' , compact('category'));
    }

   
    public function update(Request $request, Category $category)
    {
        $request->validate([
                'name' => 'required|min:3|unique:categories,name,'.$category->id
        ]);

        $category->name = $request->name;
        $category->updated_by = adminurl()->id;
        $category->save();

        session()->flash('success', trans('backend.updated_successfully'));
        return redirect()->back();
    }

    
    public function destroy(Category $category)
    {
        $category->delete();

        session()->flash('success', trans('backend.deleted_successfully'));
        return redirect()->back();
    }

    public function activation(Category $category)
    {
        if( $category->status == 1 ){
            $category->status = 0;
            $category->save();
            session()->flash('success', trans('backend.record_disabled_successfully'));
            return redirect()->back();
        }else{
            $category->status = 1;
            $category->save();
            session()->flash('success', trans('backend.record_actived_successfully'));
            return redirect()->back();
        }
        
    }
}
