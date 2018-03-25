<?php
namespace CongHD\Uploadfile\Controller\Adminhtml\filestatus;

use Braintree\Exception;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use CongHD\Uploadfile\Model\ResourceModel\Filestatus\CollectionFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Filesystem\DirectoryList;
/**
 * Class MassDelete
 */
class MassDelete extends \Magento\Backend\App\Action
{
    /**
     * @var Filter
     */
    protected $filter;
    /**
     * @var collection
     */
    protected $collection;

    protected $_filesystem;
    /**
     * @param Context $context
     * @param Filter $filter
     * @param CollectionFactory $collection
     */
    public function __construct(Context $context,\Magento\Framework\Filesystem $_filesystem, Filter $filter, CollectionFactory $collection)
    {
        $this->_filesystem = $_filesystem;
        $this->filter = $filter;
        $this->collection = $collection;
        parent::__construct($context);
    }
    /**
     * Execute action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     * @throws \Magento\Framework\Exception\LocalizedException|\Exception
     */
    public function execute()
    {
        $file_path = $this->_filesystem->getDirectoryRead(DirectoryList::MEDIA)->getAbsolutePath('images/');
        //$status = $this->getRequest()->getParam('status');
        $collection = $this->filter->getCollection($this->collection->create());
        $countDelete = $collection->getSize();
        foreach ($collection as $item) {
            try {
                unlink($file_path.$item->getFileName());
            } catch (\Exception $e){

            }

             $item->delete();
        }
        $this->messageManager->addSuccess(__('A total of %1 record(s) have been deleted.', $countDelete));
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $this->resultRedirectFactory->create()->setPath('uploadfile/*/index');
    }
}