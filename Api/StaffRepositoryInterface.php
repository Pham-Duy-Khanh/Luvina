<?php

namespace Luvina\Test\Api;

/**
 * @api
 */
interface StaffRepositoryInterface
{
    /**
     * @param Data\StaffInterface $staff
     * @return mixed
     */
    public function save(\Luvina\Test\Api\Data\StaffInterface $staff);

    /**
     * @param $id
     * @return mixed
     */
    public function get($id);

    /**
     * @param Data\StaffInterface $staff
     * @return mixed
     */
    public function delete(\Luvina\Test\Api\Data\StaffInterface $staff);

    /**
     * @param $id
     * @return mixed
     */
    public function deleteById($id);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return mixed
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * Get New Label Object
     *
     * @return \Luvina\Test\Api\Data\StaffInterface
     */
    public function createNewObject();

    /**
     * Get New Label Collection
     *
     * @return \Luvina\Test\Api\Data\StaffInterface[] Array of items.
     */
    public function createCollection();
}
