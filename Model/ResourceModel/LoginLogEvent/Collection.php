<?php
namespace Amaddatu\LoginLog\Model\ResourceModel\LoginLogEvent;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    //this is the table id
    protected $_idFieldName = 'id';
    protected $_eventPrefix = 'amaddatu_loginlog_events_collection';
    protected $_eventObject = 'loginlog_events_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Amaddatu\LoginLog\Model\LoginLogEvent', 'Amaddatu\LoginLog\Model\ResourceModel\LoginLogEvent');
    }

}
