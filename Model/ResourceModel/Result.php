<?php

namespace Luvina\Test\Model\ResourceModel;

use Magento\Framework\DB\Select;

class Result extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected $currentDbTime = null;

    public function _construct()
    {
        $this->_init('luvina_test_result', 'result_id');
    }
}
