<?php
/*
 * LavoWeb_EnquirySaver

 * @category   LavoWeb
 * @package    LavoWeb_EnquirySaver
 * @copyright  Copyright (c) 2017 LavoWeb
 * @license    https://github.com/LavoWeb/magento2-enquiry-saver/blob/master/LICENSE.md
 * @version    1.0.0
 */
namespace LavoWeb\EnquirySaver\Block\Adminhtml\Enquiry\Edit\Buttons;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class Back extends Generic implements ButtonProviderInterface
{
    /**
     * Get button data
     *
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Back'),
            'on_click' => sprintf("location.href = '%s';", $this->getBackUrl()),
            'class' => 'back',
            'sort_order' => 10
        ];
    }

    /**
     * Get URL for back (reset) button
     *
     * @return string
     */
    public function getBackUrl()
    {
        return $this->getUrl('*/*/');
    }
}
