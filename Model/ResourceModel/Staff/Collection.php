<?php

namespace Luvina\Test\Model\ResourceModel\Staff;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'staff_id';

    protected function _construct()
    {
        $this->_init(\Luvina\Test\Model\Staff::class, \Luvina\Test\Model\ResourceModel\Staff::class);
    }
}
