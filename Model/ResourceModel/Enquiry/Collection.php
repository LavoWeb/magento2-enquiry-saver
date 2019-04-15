<?php

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
