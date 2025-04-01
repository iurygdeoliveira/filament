<?php
namespace App\Repositories;

use App\Models\Store;

class StoreRepository
{
	 /**
     * @var Store
     */
    protected Store $store;

    /**
     * Store constructor.
     *
     * @param Store $store
     */
    public function __construct(Store $store)
    {
        $this->store = $store;
    }

    /**
     * Get all store.
     *
     * @return Store $store
     */
    public function all()
    {
        return $this->store->get();
    }

     /**
     * Get store by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->store->find($id);
    }

    /**
     * Save Store
     *
     * @param $data
     * @return Store
     */
     public function save(array $data)
    {
        return Store::create($data);
    }

     /**
     * Update Store
     *
     * @param $data
     * @return Store
     */
    public function update(array $data, int $id)
    {
        $store = $this->store->find($id);
        $store->update($data);
        return $store;
    }

    /**
     * Delete Store
     *
     * @param $data
     * @return Store
     */
   	 public function delete(int $id)
    {
        $store = $this->store->find($id);
        $store->delete();
        return $store;
    }
}
