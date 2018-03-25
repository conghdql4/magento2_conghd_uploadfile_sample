<?php

namespace CongHD\Uploadfile\Controller\Adminhtml\filestatus;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
    /**
     * @var PageFactory
     */
    protected $resultPagee;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Index action
     *
     * @return void
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('CongHD_Uploadfile::filestatus');
        $resultPage->addBreadcrumb(__('CongHD'), __('CongHD'));
        $resultPage->addBreadcrumb(__('Manage item'), __('Manage Filestatus'));
        $resultPage->getConfig()->getTitle()->prepend(__('Manage Filestatus'));

        return $resultPage;
    }
}
?>