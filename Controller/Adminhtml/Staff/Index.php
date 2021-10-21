<?php

namespace Luvina\Test\Controller\Adminhtml\Staff;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;

class Index extends Action
{
    /**
     * @param Context $context
     */
    public function __construct(
        Context $context
    ) {
        parent::__construct($context);
    }

    /**
     * Widget Instances Grid
     *
     * @return void
     */
    public function execute()
    {
        $this->_initAction();
        $this->_view->getPage()->getConfig()->getTitle()->prepend(__('Manage Staff'));
        $this->_view->renderLayout();
    }

    /**
     * Load layout, set active menu and breadcrumbs
     *
     * @return $this
     */
    protected function _initAction()
    {
        $this->_view->loadLayout();
        $this->_setActiveMenu(
            'Luvina_Test::staff'
        )->_addBreadcrumb(
            __('Popup'),
            __('Popup')
        )->_addBreadcrumb(
            __('Manage Staff'),
            __('Manage Staff')
        );
        return $this;
    }
}
