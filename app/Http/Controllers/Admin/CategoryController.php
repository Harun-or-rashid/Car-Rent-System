<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //
    /*show all category list*/
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.all_category', compact('categories'));
    }


    /*show add new category form*/
    public function create()
    {
        return view('admin.category.add_new_category');
    }


    /*store new category*/
    public function store(Request $request)
    {
        $validateData = Validator::make($request->all(), [
            'name' => ['required', 'unique:categories,name'],
        ]);

        if($validateData->fails()){
            return redirect()->back()->withInput()->withErrors($validateData);
        }

        try{
            Category::create([
                'name' => $request->name,
                'slug' => str_slug($request->name),
            ]);

            session()->flash('type', 'success');
            session()->flash('message', 'Successfully created '.$request->name.' category....');

            $categories = Category::all();
            return redirect()->route('admin.category.index', compact('categories'));

        }catch (\Exception $e){
            session()->flash('type', 'danger');
            session()->flash('message', 'something went wrong to create category. please try again later..');
            return redirect()->back();
        }
    }


    /*show edit form of a category*/
    public function edit($slug)
    {
        try{

            $category = Category::where('slug', $slug)->first();
            if($category){
                return view('admin.category.edit_category', compact('category'));
            }else{
                session()->flash('type', 'danger');
                session()->flash('message', 'can\'t find this category....!');

                $categories = Category::all();
                return redirect()->route('admin.category.index', compact('categories'));
            }

        }catch (\Exception $e){
            session()->flash('type', 'danger');
            session()->flash('message', 'something went wrong to edit category. please try again later..');
            return redirect()->back();
        }
    }


    /*update category*/
    public function update(Request $request, $slug)
    {
        try{
            $category = Category::where('slug', $slug)->first();
            if($category){

                $category->name = $request->name;
                $category->save();

                session()->flash('type', 'success');
                session()->flash('message', 'Successfully updated category....');
                $categories = Category::all();
                return redirect()->route('admin.category.index', compact('categories'));

            }else{
                session()->flash('type', 'danger');
                session()->flash('message', 'can\'t find this category....!');

                $categories = Category::all();
                return redirect()->route('admin.category.index', compact('categories'));
            }

        }catch (\Exception $e){
            session()->flash('type', 'danger');
            session()->flash('message', 'something went wrong to edit category. please try again later..');
            return redirect()->back();
        }
    }


    /*delete category*/
    public function delete($slug)
    {
        try{

            Category::where('slug', $slug)->delete();

            session()->flash('type', 'success');
            session()->flash('message', 'Successfully deleted category....');
            return redirect()->back();

        }catch (\Exception $e){
            session()->flash('type', 'danger');
            session()->flash('message', 'something went wrong to delete category. please try again later..');
            return redirect()->back();
        }
    }
}
