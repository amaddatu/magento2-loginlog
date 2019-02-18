<?php
/**
 *
 * 
 */
namespace Amaddatu\LoginLog\Controller\LoginList;
use Amaddatu\LoginLog\Model\LoginLogEventFactory;
use Amaddatu\LoginLog\Model\LoginLogEventRepository;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Controller\ResultFactory;
 
class Index extends Action
{
    /**
     * @param Context $context
     */
    public function __construct(
        Context $context,
        LoginLogEventFactory $loginLogEventFactory,
        LoginLogEventRepository $loginLogEventRepository
        )
    {
        parent::__construct($context);
        $this->loginLogEventFactory = $loginLogEventFactory;
        $this->loginLogEventRepository = $loginLogEventRepository;
    }
    public function execute()
    {
        $response_data = [];
        $response_data['test'] = get_class($this->loginLogEventRepository);
        // echo get_class($this->resultFactory->create(ResultFactory::TYPE_JSON));
        // exit;
        // return null;
        $result_json = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        $result_json->setData($response_data);
        return $result_json;
    }
}