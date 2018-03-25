<?php

namespace CongHD\Uploadfile\Ui\Component\Listing\Column;

class Status implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [['value' => 0, 'label' => __('Not yet confirm')], ['value' => 1, 'label' => __('Public')], ['value' => 2, 'label' => __('Unpublic')]];
    }
}