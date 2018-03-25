<?php

namespace CongHD\Uploadfile\Block\Upload;

use Magento\Framework\App\Filesystem\DirectoryList;
class Index extends \Magento\Framework\View\Element\Template {

    public function __construct(\Magento\Catalog\Block\Product\Context $context, array $data = [])
    {
        parent::__construct($context, $data);

    }
protected $_fileUploaderFactory;
        protected $_storeManager;
        protected $_urlInterface;

    protected function _prepareLayout()
    {
        return parent::_prepareLayout();
    }

    public function getStoreManagerData()
    {

    return $this->_filesystem->getDirectoryRead(DirectoryList::MEDIA)->getAbsolutePath('images/');
    }

    public function insertData($file_name,$file_size,$user_name, $store_name,$ip_address)
    {
        /*$objectManager = \Magento\Framework\App\ObjectManager::getInstance(); // Instance of object manager
        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $connection = $resource->getConnection();
      
         //Insert Data into table
        $sql = "Insert Into file_status (file_name,file_status, file_size) Values ('".$file_name."',0,".$file_size.")";
        $connection->query($sql);*/
        /*$sql = "INSERT INTO file_status (file_id, file_name, file_status, file_size, user_name, store_name, ip_address)
                VALUES (NULL, '".$file_name."', '0', '".$file_size."', '".$user_name."', '".$store_name."', '".$ip_address."')";
        echo $sql;*/
        $data = $this->getRequest()->getPostValue();
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $model = $objectManager->create('CongHD\Uploadfile\Model\Filestatus');


        $data['file_status'] = '0';
        $data['file_name'] = $file_name;
        $data['file_size'] = $file_size;
        $data['user_name'] = $user_name;
        $data['store_name'] = $store_name;
        $data['ip_address'] = $ip_address;
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $data['date_uploaded'] = date("Y-m-d h:i:s");
        $model->setData($data);
        $model->save();

    }
}