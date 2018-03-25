<?php
namespace CongHD\Uploadfile\Block\Listupload;
class Display extends \Magento\Framework\View\Element\Template
{
	protected $_filestatusFactory;
		 protected $storeManager;

	public function __construct(
		\Magento\Framework\View\Element\Template\Context $context,
		\Magento\Store\Model\StoreManagerInterface $storeManager,
		\CongHD\Uploadfile\Model\FileStatusFactory $filestatusFactory
	)
	{
		$this->_filestatusFactory = $filestatusFactory;
		$this->storeManager = $storeManager;
		parent::__construct($context);
	}

    public function getSizeCollect()
    {
        $file = $this->_filestatusFactory->create();
        $file_status = $file->getCollection();
        $file_status->addFieldToFilter('file_status', 1 );
        return $file_status->getSize();
    }

	public function getFilestatusCollection(){

	    $page = 1;
        if (isset($_GET['page'])){
            $page = $_GET['page'];
        }
		$file = $this->_filestatusFactory->create();
		$file_status = $file->getCollection();
        $file_status->addFieldToFilter('file_status', 1 )
        ->setPageSize(12)
        ->setCurPage($page);
        return $file_status;
	}
     /*public function getNews()
        {
            //get values of current page
            $page=($this->getRequest()->getParam('p'))? $this->getRequest()->getParam('p') : 1;
            //get values of current limit
            $pageSize=($this->getRequest()->getParam('limit'))? $this->getRequest()->getParam('limit') : 1;


            $newsCollection = $this->_filestatusFactory->create();
            $newsCollection->setPageSize($pageSize);
            $newsCollection->setCurPage($page);
            return $newsCollection;
        }
    protected function _prepareLayout()
    {
        parent::_prepareLayout();

        if ($this->getNews()) {
            $pager = $this->getLayout()->createBlock(
                'Magento\Theme\Block\Html\Pager',
                'fme.news.pager'
            )->setAvailableLimit(array(5=>5,10=>10,15=>15))->setShowPerPage(true)->setCollection(
                $this->getNews()
            );
            $this->setChild('pager', $pager);
            $this->getNews()->load();
        }
        return $this;
    }

    public function getPagerHtml()
    {
        return __($this->getNews()->getCollection().getSize());$this->getChildHtml('pager');
    }*/

public function getMediaimg($imgname){
    $folderName = 'images';
    $path = $folderName . '/' . $imgname;
    return $this->storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA) . $path;
}
}