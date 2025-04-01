<?php
namespace App\Services;

use App\Models\Store;
use App\Repositories\StoreRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class StoreService
{
	/**
     * @var StoreRepository $storeRepository
     */
    protected $storeRepository;

    /**
     * DummyClass constructor.
     *
     * @param StoreRepository $storeRepository
     */
    public function __construct(StoreRepository $storeRepository)
    {
        $this->storeRepository = $storeRepository;
    }

    /**
     * Get all storeRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->storeRepository->all();
    }

    /**
     * Get storeRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->storeRepository->getById($id);
    }

    /**
     * Validate storeRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->storeRepository->save($data);
    }

    /**
     * Update storeRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $storeRepository = $this->storeRepository->update($data, $id);
            DB::commit();
            return $storeRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete storeRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $storeRepository = $this->storeRepository->delete($id);
            DB::commit();
            return $storeRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
