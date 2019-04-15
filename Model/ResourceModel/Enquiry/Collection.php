<?php
// @codingStandardsIgnoreFile
/*
 * LavoWeb_EnquirySaver

 * @category   LavoWeb
 * @package    LavoWeb_EnquirySaver
 * @copyright  Copyright (c) 2017 LavoWeb
 * @license    https://github.com/LavoWeb/magento2-enquiry-saver/blob/master/LICENSE.md
 * @version    1.0.0
 */
namespace LavoWeb\EnquirySaver\Model\ResourceModel\Enquiry;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'enquiry_id';

    /**
     * Collection initialisation
     */
    protected function _construct()
    {
        $this->_init(
            'LavoWeb\EnquirySaver\Model\Enquiry',
            'LavoWeb\EnquirySaver\Model\ResourceModel\Enquiry'
        );
    }
}
