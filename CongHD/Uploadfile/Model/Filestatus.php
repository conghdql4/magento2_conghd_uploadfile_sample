<?php
namespace CongHD\Uploadfile\Model;

class Filestatus extends \Magento\Framework\Model\AbstractModel
{


	const CACHE_TAG = 'file_status';

	protected $_cacheTag = 'file_status';

	protected $_eventPrefix = 'file_status';

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('CongHD\Uploadfile\Model\ResourceModel\Filestatus');
    }

    public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}
?>