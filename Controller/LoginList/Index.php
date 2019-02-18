<?php
/**
 *
 * 
 */
namespace Amaddatu\LoginLog\Controller\LoginList;
use Amaddatu\LoginLog\Model\LoginLogEventFactory;
use Amaddatu\LoginLog\Model\LoginLogEventRepository;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Model\Session;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\Result\PageFactory;
 
class Index extends Action
{
    /**
     * @var \Magento\Customer\Api\CustomerRepositoryInterface
     */
    protected $customerRepository;

    /**
     * @var \Magento\Framework\Api\DataObjectHelper
     */
    protected $dataObjectHelper;

    /**
     * @var Session
     */
    protected $session;

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var LoginLogEventFactory
     */
    protected $loginLogEventFactory;

    /**
     * @var LoginLogEventRepository
     */
    protected $loginLogEventRepository;

    /**
     * @param Context $context
     * @param Session $customerSession
     * @param PageFactory $resultPageFactory
     * @param CustomerRepositoryInterface $customerRepository
     * @param DataObjectHelper $dataObjectHelper
     * @param LoginLogEventFactory $loginLogEventFactory
     * @param LoginLogEventRepository $loginLogEventRepository
     */
    public function __construct(
        Context $context,
        Session $customerSession,
        PageFactory $resultPageFactory,
        CustomerRepositoryInterface $customerRepository,
        DataObjectHelper $dataObjectHelper,
        LoginLogEventFactory $loginLogEventFactory,
        LoginLogEventRepository $loginLogEventRepository
        )
    {
        parent::__construct($context);
        $this->session = $customerSession;
        $this->resultPageFactory = $resultPageFactory;
        $this->customerRepository = $customerRepository;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->loginLogEventFactory = $loginLogEventFactory;
        $this->loginLogEventRepository = $loginLogEventRepository;
    }
    public function execute()
    {
        $response_data = [];
        $response_data['test'] = get_class($this->loginLogEventRepository);
        $customerId = $this->session->getCustomerId();
        $response_data['customer_id'] = $customerId;
        if($customerId !== null){
            $customerDataObject = $this->customerRepository->getById($customerId);
            $response_data['customer_data'] = $customerDataObject->debug();
        }
        // echo get_class($this->resultFactory->create(ResultFactory::TYPE_JSON));
        // exit;
        // return null;
        $result_json = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        $result_json->setData($response_data);
        return $result_json;
    }
}