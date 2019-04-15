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

use LavoWeb\EnquirySaver\Controller\Adminhtml\EnquirySaver;

class Edit extends EnquirySaver
{
    /**
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('LavoWeb_EnquirySaver::contact_enquiries')
            ->addBreadcrumb(__('Enquiries'), __('Enquiries'))
            ->addBreadcrumb(__('Manage Enquiries'), __('Manage Enquiries'));

        $resultPage->addBreadcrumb(
            __('Enquiry'),
            __(sprintf('Enquiry: #%s', $this->getRequest()->getParam('enquiry_id')))
        );
        $resultPage->getConfig()->getTitle()->prepend(
            __(sprintf('Enquiry: #%s', $this->getRequest()->getParam('enquiry_id')))
        );

        return $resultPage;
    }
}
