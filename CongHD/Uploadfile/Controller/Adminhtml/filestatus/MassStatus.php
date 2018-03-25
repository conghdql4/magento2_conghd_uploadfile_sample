<?php
namespace CongHD\Uploadfile\Controller\Adminhtml\filestatus;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use CongHD\Uploadfile\Model\ResourceModel\Filestatus\CollectionFactory;
use Magento\Framework\Controller\ResultFactory;

class MassStatus extends \Magento\Backend\App\Action
{
    /**
     * @var Filter
     */
    protected $filter;
    /**
     * @var collection
     */
    protected $collection;
    /**
     * @param Context $context
     * @param Filter $filter
     * @param CollectionFactory $collection
     */
    public function __construct(Context $context, Filter $filter, CollectionFactory $collection)
    {
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
        $status = $this->getRequest()->getParam('status');
        $collection = $this->filter->getCollection($this->collection->create());
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); // Instance of object manager
        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $connection = $resource->getConnection();

        //Insert Data into table

        foreach ($collection as $item) {
            $item->setFileStatus($status);
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $item->setDateUpdated( date("Y-m-d h:i:s"));
            $item->save();
        }
        $this->messageManager->addSuccess(__('A total of %1 record(s) have been updated.', $collection->getSize()));
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $this->resultRedirectFactory->create()->setPath('uploadfile/*/index');
    }

}