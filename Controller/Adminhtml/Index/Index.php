<?php

namespace LavoWeb\EnquirySaver\Controller\Adminhtml\Index;

use LavoWeb\EnquirySaver\Controller\Adminhtml\EnquirySaver;

class Index extends EnquirySaver
{
    /**
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('LavoWeb_EnquirySaver::contact_enquiries');
        $resultPage->getConfig()->getTitle()->prepend(__('Contact Form Enquiries'));
        $resultPage->addBreadcrumb(__('Contact Form Enquiries'), __('Contact Form Enquiries'));
        return $resultPage;
    }
}
