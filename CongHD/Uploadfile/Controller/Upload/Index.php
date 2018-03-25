<?php

namespace CongHD\Uploadfile\Controller\Upload;

class Index extends \Magento\Framework\App\Action\Action
{
    
    /**
     * Upload file controller action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
         $this->_view->loadLayout();
        $this->_view->getLayout()->initMessages();
        $this->_view->renderLayout();

    }





}