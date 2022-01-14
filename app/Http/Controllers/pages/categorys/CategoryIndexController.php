<?php

namespace App\Http\Controllers\pages\categorys;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\CategoryDataTable;
use App\Http\Requests\category\StoreCategory;
use App\Http\Requests\category\UpdateCategory;



class CategoryIndexController extends Controller
{
    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('pages.category.index');
        
        // return view('pages.category.index',compact('data'));
    }

    
    public function create()
    {
        return view('pages.category.add');
    }

    
    public function store(StoreCategory $request)
    {
        $data = $request->all();
        $target_data = Category::create($data);
        $target_data->save();

        return back()->with('success','you added category succssefully');
    }

   
    public function edit(Category $category)
    {
        $data = Category::where('id',$category->id)->first();
        return view('pages.category.edit' ,compact('data'));
    }

   
    public function update(UpdateCategory $request, Category $category)
    {
        $data = $request->all();
        $target_data = Category::where('id',$category->id)->first();
        $target_data->update($data);
        
        return redirect('/categories')->with('update','you updated category succssefully');
    }

   
    public function destroy(Category $category)
    {
        $data = Category::where('id',$category->id)->first();
        $data->delete();

        return redirect('/categories')->with('delete','you deleted category succssefully');
    }

}
