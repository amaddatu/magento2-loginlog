<?php
namespace Amaddatu\LoginLog\Model\ResourceModel;


class LoginLogEvent extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    
    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    )
    {
        parent::__construct($context);
    }
    
    protected function _construct()
    {
        // this references the table and the id used for the table
        $this->_init('am_loginlog_events', 'id');
    }
    
}