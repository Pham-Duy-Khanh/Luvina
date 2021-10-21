<?php

namespace Luvina\Test\Model;

use Luvina\Test\Api\Data;
use Magento\Framework\Exception\ValidatorException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\CouldNotDeleteException;
use Luvina\Test\Api\StaffRepositoryInterface;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class StaffRepository implements StaffRepositoryInterface
{

    protected $staffFactory;

    protected $collection;

    protected $staffResource;

    /**
     * @var array
     */
    private $label = [];

    public function __construct(
        \Luvina\Test\Model\StaffFactory $staffFactory,
        \Luvina\Test\Model\ResourceModel\Staff\CollectionFactory $collection,
        \Luvina\Test\Model\ResourceModel\Staff $staffResource
    ){
        $this->staffFactory = $staffFactory;
        $this->collection = $collection;
        $this->staffResource = $staffResource;
    }

    public function save(Data\StaffInterface $staff)
    {
        // TODO: Implement save() method.
    }

    public function get($id)
    {
        if (!isset($this->label[$id])) {
            /** @var \Luvina\Test\Model\Staff $label */
            $label = $this->staffFactory->create();

            $this->staffResource->load($label, $id);
            if (!$label->getId()) {
                throw new NoSuchEntityException(
                    __('The rule with the "%1" ID wasn\'t found. Verify the ID and try again.', $id)
                );
            }
            $this->label[$id] = $label;
        }
        return $this->label[$id];
    }

    public function delete(Data\StaffInterface $staff)
    {
        // TODO: Implement delete() method.
    }

    public function deleteById($id)
    {
        // TODO: Implement deleteById() method.
    }

    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        // TODO: Implement getList() method.
    }

    public function createNewObject()
    {
        return $this->staffFactory->create();
    }

    public function createCollection()
    {
        return $this->collection->create();
    }
}
