<?php

namespace CongHD\Uploadfile\Model\ResourceModel\Filestatus;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    protected $_idFieldName = 'file_id';
    protected $_eventPrefix = 'conghd_uploadfile_filestatus_collection';
    protected $_eventObject = 'file_collection';
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('CongHD\Uploadfile\Model\Filestatus', 'CongHD\Uploadfile\Model\ResourceModel\Filestatus');
        $this->_map['fields']['page_id'] = 'main_table.page_id';
    }

}
?>