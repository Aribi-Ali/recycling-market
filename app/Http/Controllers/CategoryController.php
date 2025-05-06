<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller{

    protected $categoryService;

    public function __construct(CategoryService $categoryService){
        $this->categoryService = $categoryService;
    }

    public function index(){
        $categories = $this->categoryService->getAll();
        return view('categories.index', compact('categories'));
    }

    /*public function show(Category $categoryId){
        $category = $this->categoryService->getById($categoryId);
        return view('category.show', compact("category"));
    }*/

    public function store(Request $request){
        $request->validate([
            "name" => "required|string|max:100|unique:categories,name",
        ]);
        $this->categoryService->create([
            "name" => $request->get("name"),
        ]);
        return redirect()->back()->with('success', 'Category created!');
    }

    /*public function update(Request $request, Category $categoryId){
        $request->validate([
            "name" => "required|string|max:100|unique:categories,name," .$categoryId,
        ]);
        $this->categoryService->update($request, $categoryId);
        return redirect()->back()->with('success', 'Category updated!');
    }*/

    public function destroy($categoryId){
        try {
            $this->categoryService->delete($categoryId);
            return redirect()->back()
                ->with('success', 'Category deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to delete category');
        }
    }
}
