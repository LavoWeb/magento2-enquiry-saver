<?php
/*
 * LavoWeb_EnquirySaver

 * @category   LavoWeb
 * @package    LavoWeb_EnquirySaver
 * @copyright  Copyright (c) 2017 LavoWeb
 * @license    https://github.com/LavoWeb/magento2-enquiry-saver/blob/master/LICENSE.md
 * @version    1.0.0
 */
namespace LavoWeb\EnquirySaver\Controller\Adminhtml\Index;

use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\ForwardFactory;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Magento\Ui\Component\MassAction\Filter;
use LavoWeb\EnquirySaver\Api\EnquiryRepositoryInterface;
use LavoWeb\EnquirySaver\Controller\Adminhtml\EnquirySaver;
use LavoWeb\EnquirySaver\Model\ResourceModel\Enquiry\CollectionFactory;

class MassDelete extends EnquirySaver
{
    /**
     * @var Filter
     */
    protected $filter;

    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @var ForwardFactory
     */
    protected $resultForwardFactory;

    /**
     * @var string
     */
    protected $successMessage;

    /**
     * @var string
     */
    protected $errorMessage;

    /**
     * MassDelete constructor.
     * @param Registry $registry
     * @param EnquiryRepositoryInterface $enquiryRepository
     * @param PageFactory $resultPageFactory
     * @param ForwardFactory $resultForwardFactory
     * @param Context $context
     * @param Filter $filter
     * @param CollectionFactory $collectionFactory
     * @param $successMessage
     * @param $errorMessage
     */
    public function __construct(
        Registry $registry,
        EnquiryRepositoryInterface $enquiryRepository,
        PageFactory $resultPageFactory,
        ForwardFactory $resultForwardFactory,
        Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory,
        $successMessage,
        $errorMessage
    ) {
        parent::__construct($registry, $enquiryRepository, $resultPageFactory, $resultForwardFactory, $context);
        $this->filter            = $filter;
        $this->collectionFactory = $collectionFactory;
        $this->successMessage    = $successMessage;
        $this->errorMessage      = $errorMessage;
    }

    /**
     * execute action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        try {
            $collection = $this->filter->getCollection($this->collectionFactory->create());
            $collectionSize = $collection->getSize();
            foreach ($collection as $enquiry) {
                $this->enquiryRepository->delete($enquiry);
            }
            $this->messageManager->addSuccessMessage(__($this->successMessage, $collectionSize));
        } catch (LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        } catch (\Exception $e) {
            $this->messageManager->addExceptionMessage($e, __($this->errorMessage));
        }
        $redirectResult = $this->resultRedirectFactory->create();
        $redirectResult->setPath('enquirysaver/index');
        return $redirectResult;
    }
}
