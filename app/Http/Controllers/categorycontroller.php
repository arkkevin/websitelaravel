<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\category;
use Illuminate\Http\Request;

class categorycontroller extends Controller
{
    public function category()
    {
        $categories = category::all();
        return view('pages.categories',compact('category'),[
            'barangs' => barang::all(),
            'title' => $categories->name,
            'barangs'=> $categories->barangs,
            'category' => $categories->name
        ]);
    }

    public function show($id){
        $category = category::findOrFail($id);
        return view('pages.categories', [
            'title' => 'Categories',
            'barangs' => $category->barangs,
            'category' => $category->name
        ]);
    }
    public function mysearch(Request $request){
        $barangs = barang::where('namabarang','LIKE',"%$request->search%")->simplepaginate(8);

        return view('pages.categories',[
            'title' => 'Search Product'
        ])->with('barangs',$barangs);

    }

    public function insertcategory(){
        $categories = category::all();
        return view('pages.addcategory',compact('categories'),[
            'title' => 'Add Item'
        ]);
    }


    public function categoryinserted(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => 'required|unique:categories|max:255'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;

        $category->save();
        return redirect()->route('categories')->with('success','Category has been Inserted');
    }

    public function openCategory(int $barang){
        $categories = category::all();
        $barang = barang::findOrFail($barang);
        // dd($barang);
        return view('pages.viewitem',compact('categories','barang'),[
            'title' => 'UpdateItem',
        ]);
    }

    public function updateCategory(Request $request, Category $category){
        $request->validate([
            'name' => 'required|unique:categories|max:255'
        ]);

        $category->update($request->all());

        return redirect()->route('category')->with('success','Category has been Updated');
    }

    public function deleteCategory(Category $category){

        $category->delete();
        return redirect()->route('category')->with('success','Category has been Deleted');
    }
}
