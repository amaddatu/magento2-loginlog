<?php
/**
 * Customer Login Observer
 * 
 * Copyright © Anthony Maddatu 
 */
namespace Amaddatu\LoginLog\Observer;

use Magento\Framework\App\Helper\Context;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class CustomerLoginEventObserver implements ObserverInterface
{
    /**
     *  @var \Magento\Framework\App\Helper\Context this variable is used to avoid a possible deprecation issues with inheritance based classes
     */
    protected $_context;
    /**
     * @param \Magento\Framework\App\Helper\Context $context this will be used to grab both the remote ip and the logger
     */
    public function __construct(
        Context $context
    ){
        $this->_context = $context;
    }
    /**
     * @param \Magento\Framework\Event\Observer $observer this should hold the customer object
     */
    public function execute(Observer $observer)
    {
        // $logger = $this->_context->getLogger();
        // $logger->addDebug("Customer Login Event");
        $customer = $observer->getEvent()->getCustomer();
        $remote_address = $this->_context->getRemoteAddress()->getRemoteAddress();
        $customer_id = $customer->getId();
        // $logger->addDebug($customer->getName()); //Get customer name

        // echo get_class($logger);
        // echo $customer->getId() . "<br/>";
        // echo $this->_context->getRemoteAddress()->getRemoteAddress();
        // echo "event observed: " . $customer->getName();
        // exit;
    }
}