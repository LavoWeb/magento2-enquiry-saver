<?php

namespace LavoWeb\EnquirySaver\Block\Adminhtml\Enquiry\Edit\Buttons;

use LavoWeb\EnquirySaver\Api\EnquiryRepositoryInterface;
use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Exception\NoSuchEntityException;

class Generic
{
    /**
     * @var Context
     */
    protected $context;

    /**
     * @var EnquiryRepositoryInterface
     */
    protected $enquiryRepository;

    /**
     * @param Context $context
     * @param EnquiryRepositoryInterface $enquiryRepository
     */
    public function __construct(
        Context $context,
        EnquiryRepositoryInterface $enquiryRepository
    )
    {
        $this->context = $context;
        $this->enquiryRepository = $enquiryRepository;
    }

    /**
     * Return Enquiry ID
     *
     * @return int|null
     */
    public function getEnquiryId()
    {
        try {
            return $this->enquiryRepository->getById(
                $this->context->getRequest()->getParam('enquiry_id')
            )->getId();
        } catch (NoSuchEntityException $e) {
            return null;
        }
    }

    /**
     * Generate url by route and parameters
     *
     * @param   string $route
     * @param   array $params
     * @return  string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}
