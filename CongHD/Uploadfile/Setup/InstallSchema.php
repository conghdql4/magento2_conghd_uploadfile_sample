<?php

namespace CongHD\Uploadfile\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\DB\Adapter\AdapterInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();


            $installer->run('CREATE TABLE file_status (
                              file_id int(11) NOT NULL,
                              file_name varchar(100) ,
                              file_status int(11) ,
                              file_size int(11) ,
                              user_name varchar(30) ,
                              store_name varchar(50) ,
                              ip_address varchar(30) ,
                              browser varchar(100) ,
                              date_uploaded timestamp ,
                              date_updated timestamp )');


            //demo
//$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
//$scopeConfig = $objectManager->create('Magento\Framework\App\Config\ScopeConfigInterface');
//demo 


        $installer->endSetup();

    }
}