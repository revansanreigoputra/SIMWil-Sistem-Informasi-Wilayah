<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    protected CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->categoryService->getAllCategories();
        return view('pages.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        DB::beginTransaction();
        try {
            $this->categoryService->createCategory($request->all());

            DB::commit();
            return redirect()->route('category.index')->withSuccess('Kategori berhasil dibuat.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withErrors('Gagal membuat kategori: ' . $th->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCategoryRequest $request, string $id)
    {
        DB::beginTransaction();

        try {
            $this->categoryService->updateCategory($id, $request->all());

            DB::commit();
            return redirect()->route('category.index')->withSuccess('Kategori berhasil diperbaharui.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withErrors('Gagal memperbaharui kategori: ' . $th->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->categoryService->deleteCategory($id);
        return redirect()->route('category.index')->withSuccess('Kategori berhasil dihapus.');
    }
}
