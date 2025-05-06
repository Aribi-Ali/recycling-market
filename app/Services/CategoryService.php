<?php

namespace App\Services;

use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryService{

    public function getAll(){
        $categories = Category::latest()->get();
        return CategoryResource::collection($categories);
    }

    public function getById($categoryId){
        $category = Category::findOrFail($categoryId);
        return new CategoryResource($category);
    }

    public function create($data){
        Category::create($data);
    }

    public function update($categoryId, $data){
        $category = Category::findOrFail($categoryId);
        $category->update($data);
    }

    public function delete($categoryId){
        $category = Category::findOrFail($categoryId);
        $category->delete();
    }
}
