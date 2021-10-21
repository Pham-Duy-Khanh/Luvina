<?php

namespace Luvina\Test\Block\Adminhtml\Process;

use Luvina\Test\Block\Adminhtml\Chart\Edit\Tab\CampaignGrid;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Serialize\Serializer\Json;
use Magento\Framework\View\Element\BlockInterface;

class Gird extends \Magento\Backend\Block\Widget
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
     * @var
     */
    protected $blockGrid;

    /** @var Json */
    protected $serializer;

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
        Json $serializer,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->staffCollectionFactory = $staffCollectionFactory;
        $this->resultCollectionFactory = $resultCollectionFactory;
        $this->serializer = $serializer;
    }

    /**
     * Return HTML of grid block
     * @return string
     * @throws LocalizedException
     */
    public function getGridHtml()
    {
        return $this->getBlockGrid()->toHtml();
    }

    /**
     * @return CampaignGrid|BlockInterface
     * @throws LocalizedException
     */
    public function getBlockGrid()
    {
        if (null === $this->blockGrid) {
            $this->blockGrid = $this->getLayout()->createBlock(
                CampaignGrid::class,
                'grid.campaign.report'
            );
        }

        return $this->blockGrid;
    }

    /**
     * @return bool|string
     */
    public function getDataJson() {
        $collection = $this->staffCollectionFactory->create();
        $collection->getSelect()->joinLeft(
            ["result" => $collection->getTable("luvina_test_result")],
            'main_table.staff_id = result.staff_id'
        );
        return $this->serializer->serialize($collection->getData());
    }
}
