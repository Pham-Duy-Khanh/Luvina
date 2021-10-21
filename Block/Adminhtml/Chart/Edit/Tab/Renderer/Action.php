<?php

namespace Luvina\Test\Block\Adminhtml\Chart\Edit\Tab\Renderer;

use Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer;
use Magento\Framework\DataObject;

class Action extends AbstractRenderer
{
    /**
     * @var \Luvina\Test\Model\ResourceModel\Staff\CollectionFactory
     */
    protected $staffCollectionFactory;

    /**
     * @var \Luvina\Test\Model\ResourceModel\Result\CollectionFactory
     */
    protected $resultCollectionFactory;

    /**
     * @param \Magento\Backend\Block\Context $context
     * @param \Luvina\Test\Model\ResourceModel\Staff\CollectionFactory $staffCollectionFactory
     * @param \Luvina\Test\Model\ResourceModel\Result\CollectionFactory $resultCollectionFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Context $context,
        \Luvina\Test\Model\ResourceModel\Staff\CollectionFactory $staffCollectionFactory,
        \Luvina\Test\Model\ResourceModel\Result\CollectionFactory $resultCollectionFactory,
        array $data = []
    ){
        $this->staffCollectionFactory = $staffCollectionFactory;
        $this->resultCollectionFactory = $resultCollectionFactory;
        parent::__construct($context, $data);
    }

    /**
     * @param DataObject $row
     * @return string
     */
    public function render(DataObject $row)
    {
        $collection = $this->staffCollectionFactory->create();
        $collection->getSelect()->joinLeft(
            ["result" => $collection->getTable("luvina_test_result")],
            'main_table.staff_id = result.staff_id'
        )->where('`main_table`.staff_id = ?', $row->getData('staff_id'));
        $data = $collection->addExpressionFieldToSelect(
            'point',
            'SUM({{point}})',
            'point'
        )->getData();
        return $data[0]['point'];
    }
}
