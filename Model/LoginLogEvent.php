<?php
namespace Amaddatu\LoginLog\Model;
class LoginLogEvent extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'amaddatu_loginlog_events';

    protected $_cacheTag = 'amaddatu_loginlog_events';

    protected $_eventPrefix = 'amaddatu_loginlog_events';

    protected function _construct()
    {
        $this->_init('Amaddatu\LoginLog\Model\ResourceModel\LoginLogEvent');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}