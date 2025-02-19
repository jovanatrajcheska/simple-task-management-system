<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\DTOs\CategoryDTO;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::all();
        return response()->json($categories, status: 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $categoryDTO = new CategoryDTO($request->all());
        $category = Category::create($categoryDTO->toArray());

        return response()->json($category, status: 201);
    }
}
