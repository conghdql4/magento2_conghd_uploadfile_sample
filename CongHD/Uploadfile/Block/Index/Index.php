<?php

namespace CongHD\Uploadfile\Block\Index;


class Index extends \Magento\Framework\View\Element\Template {

    public function __construct(\Magento\Catalog\Block\Product\Context $context, array $data = []) {

        parent::__construct($context, $data);

    }


    protected function _prepareLayout()
    {
        if (isset($_POST['login']))
        {
            session_start();
            $_SESSION['username'] = $_POST['userName'];
            $_SESSION['storeName'] = $_POST['storeName'];
        }
        return parent::_prepareLayout();
    }

}