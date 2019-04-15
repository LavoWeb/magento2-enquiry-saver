<?php
/*
 * LavoWeb_EnquirySaver

 * @category   LavoWeb
 * @package    LavoWeb_EnquirySaver
 * @copyright  Copyright (c) 2017 LavoWeb
 * @license    https://github.com/LavoWeb/magento2-enquiry-saver/blob/master/LICENSE.md
 * @version    1.0.0
 */
namespace LavoWeb\EnquirySaver\Api;

use LavoWeb\EnquirySaver\Api\Data\EnquiryInterface;

/**
 * @api
 */
interface EnquiryRepositoryInterface
{
    /**
     * Save enquiry.
     *
     * @param EnquiryInterface $enquiry
     * @return EnquiryInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(EnquiryInterface $enquiry);

    /**
     * Retrieve enquiry.
     *
     * @param int $enquiryId
     * @return EnquiryInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($enquiryId);

    /**
     * Delete enquiry.
     *
     * @param EnquiryInterface $enquiry
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(EnquiryInterface $enquiry);

    /**
     * Delete enquiry by ID.
     *
     * @param int $enquiryId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($enquiryId);
}
