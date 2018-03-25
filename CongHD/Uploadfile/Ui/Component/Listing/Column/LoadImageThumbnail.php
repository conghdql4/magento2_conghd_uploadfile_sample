<?php
/**
 * Copyright © 2013-2017 Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace CongHD\Uploadfile\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Ui\Component\Listing\Columns\Column;

class LoadImageThumbnail extends Column
{
    protected $storeManager;

   public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        array $components = [],
        array $data = []
    ) {
       $this->storeManager = $storeManager;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }


    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items']))
        {

            foreach ($dataSource['data']['items'] as &$items)
            {
                $folderName = 'images';
                $path = $folderName . '/' . $items['file_name'];
                $file_path = $this->storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA) . $path;

                $items['file_name'] = '<a href="'.$file_path.'" target="_blank"> <img src="'.$file_path.'" alt = "'.$items['file_name'].'" height="42" width="42"></a>';

            }
        }
        return $dataSource;
    }

}
