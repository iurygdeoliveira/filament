<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use App\Services\StoreService;

class StoreController extends Controller
{
    /**
     * @var StoreService
     */
    protected StoreService $storeService;

    /**
     * DummyModel Constructor
     *
     * @param StoreService $storeService
     *
     */
    public function __construct(StoreService $storeService)
    {
        $this->storeService = $storeService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $stores = $this->storeService->getAll();
        return view('stores.index', compact('stores'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('stores.create');
    }

    public function store(StoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->storeService->save($request->validated());
        return redirect()->route('stores.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $store = $this->storeService->getById($id);
        return view('stores.show', compact('store'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $store = $this->storeService->getById($id);
        return view('stores.edit', compact('store'));
    }

    public function update(StoreRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->storeService->update($request->validated(), $id);
        return redirect()->route('stores.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->storeService->deleteById($id);
        return redirect()->route('stores.index')->with('success', 'Deleted successfully');
    }
}
