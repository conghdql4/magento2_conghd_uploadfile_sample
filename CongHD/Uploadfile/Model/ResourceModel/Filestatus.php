<?php
namespace CongHD\Uploadfile\Model\ResourceModel;

class Filestatus extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    
	public function __construct(
		\Magento\Framework\Model\ResourceModel\Db\Context $context
	)
	{
		parent::__construct($context);
	}
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('file_status', 'file_id');
    }
}
?>