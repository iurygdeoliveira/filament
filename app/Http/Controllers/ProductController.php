<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Services\ProductService;

class ProductController extends Controller
{
    /**
     * @var ProductService
     */
    protected ProductService $productService;

    /**
     * DummyModel Constructor
     *
     * @param ProductService $productService
     *
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $products = $this->productService->getAll();
        return view('products.index', compact('products'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('products.create');
    }

    public function store(ProductRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->productService->save($request->validated());
        return redirect()->route('products.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $product = $this->productService->getById($id);
        return view('products.show', compact('product'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $product = $this->productService->getById($id);
        return view('products.edit', compact('product'));
    }

    public function update(ProductRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->productService->update($request->validated(), $id);
        return redirect()->route('products.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->productService->deleteById($id);
        return redirect()->route('products.index')->with('success', 'Deleted successfully');
    }
}
