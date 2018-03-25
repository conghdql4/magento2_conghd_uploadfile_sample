<?php
namespace CongHD\Uploadfile\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade( SchemaSetupInterface $setup, ModuleContextInterface $context ) {
        $installer = $setup;

        $installer->startSetup();

        if(version_compare($context->getVersion(), '1.1.0', '<')) {
            if (!$installer->tableExists('file_status')) {
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

        $installer->endSetup();
    }
}