<?php

namespace Luvina\Test\Model\ResourceModel\Result;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'result_id';

    protected function _construct()
    {
        $this->_init(\Luvina\Test\Model\Result::class, \Luvina\Test\Model\ResourceModel\Result::class);
    }
}
