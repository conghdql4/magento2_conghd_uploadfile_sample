<?php
namespace CongHD\Uploadfile\Block\Adminhtml\Filestatus\Edit;

/**
 * Admin page left menu
 */
class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    /**
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('filestatus_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Filestatus Information'));
    }
}