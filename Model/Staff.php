<?php

namespace Luvina\Test\Model;

use Magento\Rule\Model\AbstractModel;
use Magento\Framework\Api\AttributeValueFactory;
use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Api\ExtensionAttributesFactory;
use Luvina\Test\Api\Data\StaffInterface;

class Staff extends AbstractModel implements StaffInterface, IdentityInterface
{

    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Framework\Stdlib\DateTime\TimezoneInterface $localeDate,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = [],
        ExtensionAttributesFactory $extensionFactory = null,
        AttributeValueFactory $customAttributeFactory = null,
        \Magento\Framework\Serialize\Serializer\Json $serializer = null
    ){
        parent::__construct($context, $registry, $formFactory, $localeDate, $resource, $resourceCollection, $data, $extensionFactory, $customAttributeFactory, $serializer);
    }


    protected function _construct()
    {
        $this->_init('\Luvina\Test\Model\ResourceModel\Staff');
    }


    public function getStaffId()
    {
        return $this->_getData(StaffInterface::STAFF_ID);
    }

    public function setStaffId($staffId)
    {
        return $this->setData(StaffInterface::STAFF_ID, $staffId);
    }

    public function getName()
    {
        return $this->_getData(StaffInterface::NAME);
    }

    public function setName($name)
    {
        return $this->setData(StaffInterface::NAME, $name);
    }

    public function getBirthday()
    {
        return $this->_getData(StaffInterface::BIRTHDAY);
    }

    public function setBirthday($birthday)
    {
        return $this->setData(StaffInterface::BIRTHDAY, $birthday);
    }

    public function getConditionsInstance()
    {
        // TODO: Implement getConditionsInstance() method.
    }

    public function getActionsInstance()
    {
        // TODO: Implement getActionsInstance() method.
    }

    public function getIdentities()
    {
        // TODO: Implement getIdentities() method.
    }
}
