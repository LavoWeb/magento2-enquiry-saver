<?php

namespace LavoWeb\EnquirySaver\Ui\DataProvider\Enquiry\Form\Modifier;

use LavoWeb\EnquirySaver\Model\ResourceModel\Enquiry\CollectionFactory;
use Magento\Ui\DataProvider\Modifier\ModifierInterface;

class EnquiryData implements ModifierInterface
{
    /**
     * @var \LavoWeb\EnquirySaver\Model\ResourceModel\Enquiry\Collection
     */
    protected $collection;

    /**
     * @param CollectionFactory $enquiryCollectionFactory
     */
    public function __construct(
        CollectionFactory $enquiryCollectionFactory
    )
    {
        $this->collection = $enquiryCollectionFactory->create();
    }

    /**
     * @param array $meta
     * @return array
     */
    public function modifyMeta(array $meta)
    {
        return $meta;
    }

    /**
     * @param array $data
     * @return array|mixed
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function modifyData(array $data)
    {
        $items = $this->collection->getItems();
        /** @var $enquiry \LavoWeb\EnquirySaver\Model\Enquiry */
        foreach ($items as $enquiry) {
            $_data = $enquiry->getData();
            $enquiry->setData($_data);
            $data[$enquiry->getId()] = $_data;
        }
        return $data;
    }
}
