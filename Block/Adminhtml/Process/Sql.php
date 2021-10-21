<?php

namespace Luvina\Test\Block\Adminhtml\Process;

class Sql extends \Magento\Backend\Block\Widget
{

    protected $staffCollectionFactory;

    /**
     * @var \Luvina\Test\Model\ResourceModel\Result\CollectionFactory
     */
    protected $resultCollectionFactory;

    /**
     * Import constructor.
     *
     * @param \Magento\Backend\Block\Template\Context $context
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

    public function getPeriodFromParam()
    {
        return $this->getRequest()->getParam('from');
    }
}
