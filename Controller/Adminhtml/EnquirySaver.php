<?php

namespace LavoWeb\EnquirySaver\Controller\Adminhtml;

use LavoWeb\EnquirySaver\Api\EnquiryRepositoryInterface;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\ForwardFactory;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;

abstract class EnquirySaver extends Action
{
    /**
     * @var string
     */
    const ACTION_RESOURCE = 'LavoWeb_EnquirySaver::contact_enquiries';

    /**
     * Enquiry repository
     *
     * @var EnquiryRepositoryInterface
     */
    protected $enquiryRepository;

    /**
     * Core registry
     *
     * @var Registry
     */
    protected $coreRegistry;

    /**
     * Result Page Factory
     *
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * Result Forward Factory
     *
     * @var ForwardFactory
     */
    protected $resultForwardFactory;

    /**
     * EnquirySaver constructor.
     *
     * @param Registry $registry
     * @param EnquiryRepositoryInterface $enquiryRepository
     * @param PageFactory $resultPageFactory
     * @param ForwardFactory $resultForwardFactory
     * @param Context $context
     */
    public function __construct(
        Registry $registry,
        EnquiryRepositoryInterface $enquiryRepository,
        PageFactory $resultPageFactory,
        ForwardFactory $resultForwardFactory,
        Context $context
    )
    {
        parent::__construct($context);
        $this->coreRegistry = $registry;
        $this->enquiryRepository = $enquiryRepository;
        $this->resultPageFactory = $resultPageFactory;
        $this->resultForwardFactory = $resultForwardFactory;
    }
}
