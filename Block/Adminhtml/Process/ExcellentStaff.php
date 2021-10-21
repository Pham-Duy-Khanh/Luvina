<?php

namespace Luvina\Test\Block\Adminhtml\Process;


class ExcellentStaff extends \Magento\Backend\Block\Template
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
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Luvina\Test\Model\ResourceModel\Staff\CollectionFactory $staffCollectionFactory
     * @param \Luvina\Test\Model\ResourceModel\Result\CollectionFactory $resultCollectionFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Luvina\Test\Model\ResourceModel\Staff\CollectionFactory $staffCollectionFactory,
        \Luvina\Test\Model\ResourceModel\Result\CollectionFactory $resultCollectionFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->staffCollectionFactory = $staffCollectionFactory;
        $this->resultCollectionFactory = $resultCollectionFactory;
    }

    public function getStaff() {
        return $this->staffCollectionFactory->create();
    }

    public function getResult($staffId) {
        return $this->resultCollectionFactory->create()
            ->addFieldToFilter('staff_id', $staffId)
            ->addExpressionFieldToSelect(
                'point',
                'SUM({{point}})',
                'point'
            )->getData();
    }
}
