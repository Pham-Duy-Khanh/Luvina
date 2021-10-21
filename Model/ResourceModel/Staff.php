<?php

namespace Luvina\Test\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;
use Magento\Framework\Indexer\IndexerRegistry;

class Staff extends AbstractDb
{

    /**
     * @var IndexerRegistry
     */
    protected $indexerRegistry;

    /**
     * Label constructor.
     * @param Context $context
     * @param IndexerRegistry $indexerRegistry
     * @param null $connectionName
     */
    public function __construct(
        Context $context,
        IndexerRegistry $indexerRegistry,
        $connectionName = null
    )
    {
        $this->indexerRegistry = $indexerRegistry;
        parent::__construct($context, $connectionName);
    }

    protected function _construct()
    {
        $this->_init('luvina_test_staff', 'staff_id');
    }

    /**
     * @param \Magento\Framework\Model\AbstractModel $object
     * @return Staff
     */
    protected function _afterLoad(\Magento\Framework\Model\AbstractModel $object)
    {
        return parent::_afterLoad($object);
    }

    /**
     * @param \Magento\Framework\Model\AbstractModel $object
     * @return Staff
     */
    protected function _afterDelete(\Magento\Framework\Model\AbstractModel $object)
    {
        return parent::_afterDelete($object);
    }

    /**
     * @param \Magento\Framework\Model\AbstractModel $object
     * @return Staff
     */
    protected function _afterSave(\Magento\Framework\Model\AbstractModel $object)
    {
        return parent::_afterSave($object);
    }
}
