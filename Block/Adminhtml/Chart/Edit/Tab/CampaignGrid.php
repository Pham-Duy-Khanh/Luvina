<?php

namespace Luvina\Test\Block\Adminhtml\Chart\Edit\Tab;

use Magento\Backend\Block\Template\Context;
use Magento\Backend\Block\Widget\Grid;
use Magento\Backend\Block\Widget\Grid\Extended;
use Magento\Backend\Helper\Data;
use Magento\Catalog\Model\ProductFactory;
use Magento\Framework\Registry;
use Magenest\AbandonedCart\Model\ABTestCampaignFactory;


class CampaignGrid extends \Magento\Backend\Block\Widget\Grid\Extended
{
    /**
     * Core registry
     * @var Registry $_coreRegistry
     */
    protected $_coreRegistry = null;

    /**
     * @var ProductFactory
     */
    protected $_productFactory;

    /**
     * @var ABTestCampaignFactory $_aBTestCampaignModel
     */
    protected $_aBTestCampaignModel;

    /**
     * @var \Luvina\Test\Model\ResourceModel\Staff\CollectionFactory
     */
    protected $staffCollectionFactory;

    /**
     * @var \Luvina\Test\Model\ResourceModel\Result\CollectionFactory
     */
    protected $resultCollectionFactory;

    /**
     * @param Context $context
     * @param Data $backendHelper
     * @param ProductFactory $productFactory
     * @param Registry $coreRegistry
     * @param ABTestCampaignFactory $ABTestCampaignModel
     * @param \Luvina\Test\Model\ResourceModel\Staff\CollectionFactory $staffCollectionFactory
     * @param \Luvina\Test\Model\ResourceModel\Result\CollectionFactory $resultCollectionFactory
     * @param array $data
     */
    public function __construct(
        Context $context,
        Data $backendHelper,
        ProductFactory $productFactory,
        Registry $coreRegistry,
        ABTestCampaignFactory $ABTestCampaignModel,
        \Luvina\Test\Model\ResourceModel\Staff\CollectionFactory $staffCollectionFactory,
        \Luvina\Test\Model\ResourceModel\Result\CollectionFactory $resultCollectionFactory,
        array $data = []
    ) {
        $this->_productFactory = $productFactory;
        $this->_coreRegistry = $coreRegistry;
        $this->_aBTestCampaignModel = $ABTestCampaignModel->create();
        $this->staffCollectionFactory = $staffCollectionFactory;
        $this->resultCollectionFactory = $resultCollectionFactory;
        parent::__construct($context, $backendHelper, $data);
    }

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->setId('grid_report');
        $this->setUseAjax(true);
        $this->setDefaultLimit(50);
        parent::_construct();
    }

    /**
     * @return Grid
     */
    protected function _prepareCollection()
    {
        $dataFilter = $this->getRequest()->getParams();
        $collection = $this->staffCollectionFactory->create();

        if (isset($dataFilter['date']) && isset($dataFilter['dev'])) {
            $date = date('Y-m-d', strtotime($dataFilter['date']));
            $collection->getSelect()->joinLeft(
                ["result" => $collection->getTable("luvina_test_result")],
                'main_table.staff_id = result.staff_id'
            )->where('`main_table`.staff_id = ?', $dataFilter['dev'])
            ->where('`result`. test_date = ?', $date);
            $collection->addExpressionFieldToSelect(
                'point',
                'SUM({{point}})',
                'point'
            );
        }
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    /**
     * @return Extended
     * @throws \Exception
     */
    protected function _prepareColumns()
    {
        $this->addColumn(
            'staff_id',
            [
                'header' => __('Staff ID'),
                'sortable' => true,
                'index' => 'staff_id',
                'header_css_class' => 'col-id',
                'column_css_class' => 'col-id'
            ]
        )->addColumn(
            'name',
            [
                'header' => __('Name'),
                'index' => 'name'
            ]
        )->addColumn(
            'birthday',
            [
                'type' => 'date',
                'header' => __('Birthday'),
                'index' => 'birthday',
                'timezone' => false,
                'column_css_class' => 'col-date',
                'header_css_class' => 'col-date',
            ]
        )->addColumn(
            'dev',
            [
                'header' => __('Dev'),
                'index' => 'dev'
            ]
        )->addColumn(
            'point',
            [
                'header' => __('Total Point'),
                'index' => 'point',
                'renderer' => \Luvina\Test\Block\Adminhtml\Chart\Edit\Tab\Renderer\Action::class,
            ]
        );

        return parent::_prepareColumns();
    }

    /**
     * @return string
     */
    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', ['_current' => true]);
    }

    /**
     * @param \Magento\Catalog\Model\Product|\Magento\Framework\DataObject $item
     * @return bool|string
     */
    public function getRowUrl($item)
    {
        return false;
    }
}
