<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminCategoriesController extends Controller
{
    public function index()
    {
        $category = Category::with('posts');

        return view(
            'admin.categories.index',
            [
                'categories' => $category->paginate(10)->withQueryString()
            ]
        );
    }

    public function store()
    {
        $attributes = $this-> validateCategory();

        Category::create($attributes);

        return back()->with('success', 'Category created');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', ['category' => $category]);
    }

    public function update(Category $category)
    {
        $attributes = $this-> validateCategory($category);


        $category->update($attributes);

        return back()->with('success', 'Category updated!');
    }

    public function destroy(Category $category)
    {
        if (count($category->posts) > 0) {
            return back()->with(['error' => 'Category cannot be deleted because there are posts associated with it']);
        } else {
            $category->delete();

            return back()->with('success', 'Category deleted!');
        }
    }


    protected function validateCategory(?Category $category = null): array
    {
        // if you have a new category we will use that, othervise let's set te default to a new instance of category
        $category ??= new Category();

        return request()->validate([
            'name' => 'required',
            'slug' => ['required', Rule::unique('categories', 'slug')->ignore($category)]
        ]);
    }
}
