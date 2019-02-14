<?php
/**
 *
 * 
 */
namespace Amaddatu\LoginLog\Controller\LoginList;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Controller\ResultFactory;
 
class Index extends Action
{
    public function execute()
    {
        $response_data = [];
        $response_data['test'] = "Index Success";
        // echo get_class($this->resultFactory->create(ResultFactory::TYPE_JSON));
        // exit;
        // return null;
        $result_json = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        $result_json->setData($response_data);
        return $result_json;
    }
}