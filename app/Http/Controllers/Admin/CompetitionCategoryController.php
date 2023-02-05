<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompetitionCategory\StoreCategoryRequest;
use App\Http\Requests\CompetitionCategory\UpdateCategoryRequest;
use App\Models\CubeCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CompetitionCategoryController extends Controller
{
    public function index()
    {
        $page_name = 'Categories';
        $categories = CubeCategory::when(request()->search_query, function($categories) {
            $categories = $categories->where('name', 'like', '%' . request()->search_query . '%')->orWhere('short_name', 'like', '%' . request()->search_query . '%');
        })->latest()->with('competitions')->paginate(5);

        return inertia('Admin/Competition/Category/Index', compact('page_name', 'categories'));
    }

    public function store(StoreCategoryRequest $request) 
    {
        $category = new CubeCategory($request->validated());

        try {
            if($request->hasFile('icon_img')) {
                $uploadedImage = $request->file('icon_img')->store('uploads/categories/competitions', 'public');
                $category->icon_img = $uploadedImage;
            }  

            $category->save();
            
            session()->flash('success', 'Category created successfully');;
        } catch (\Exception $e) {
            session()->flash('error', 'Category created failed');
        }
              
    }

    public function edit($id)
    {
        $category = CubeCategory::findOrFail($id);
        return response()->json($category);
    }

    public function update(UpdateCategoryRequest $request, $id){
        $category = CubeCategory::findOrFail($id);

        try {
            $fileName = $category->icon_img;
            if($request->hasFile('icon_img')) {
                if(File::exists('storage/' . $fileName)) {
                    File::delete('storage/' . $fileName);
                }
                $fileName = $request->file('icon_img')->store('uploads/categories/competitions', 'public');
            }  

            $category->name = $request->name;
            $category->short_name = $request->short_name;
            $category->icon_img = $fileName;

            $category->update();
            
            session()->flash('success', 'Category updated successfully');
        } catch (\Exception $e) {
            session()->flash('error', 'Category updated failed');
        }
    }

    public function destroy($id)
    {
        $category = CubeCategory::findOrFail($id);

        try {    
            $path = $category->icon_img;        
            if(File::exists('storage/' . $path)) {
                File::delete('storage/' . $path);
            }

            $category->delete();
            
            session()->flash('success', 'Category deleted successfully');
        } catch (\Exception $e) {
            session()->flash('error', 'Category deleted failed');
        }
    }
}
