<?php
namespace CongHD\Uploadfile\Controller\Adminhtml\filestatus;

use Magento\Backend\App\Action;
use Magento\Framework\App\Filesystem\DirectoryList;


class Save extends \Magento\Backend\App\Action
{

    protected $_filesystem;

    protected $_fileUploaderFactory;
    /**
     * @param Action\Context $context
     */
    public function __construct(Action\Context $context, \Magento\Framework\Filesystem $_filesystem, \Magento\MediaStorage\Model\File\UploaderFactory $fileUploaderFactory)
    {
        $this->_fileUploaderFactory = $fileUploaderFactory;
        $this->_filesystem = $_filesystem;
        parent::__construct($context);
    }

    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        
        
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {
            $fileSize = 0;
            $fileName = '';
            $uploader = $this->_fileUploaderFactory->create(['fileId' => 'fileToUpload']);
            try{
                $target_dir =$this->_filesystem->getDirectoryRead(DirectoryList::MEDIA)->getAbsolutePath('images/');
                /** @var $uploader \Magento\MediaStorage\Model\File\Uploader */
                //$uploader = $this->_fileUploaderFactory->create(['fileId' => 'page_fileToUpload']);
                /** Allowed extension types */
                $uploader->setAllowedExtensions(['jpg', 'pdf', 'doc', 'png', 'zip', 'doc']);
                /** rename file name if already exists */
                $uploader->setAllowRenameFiles(true);
                $fileSize = $uploader->getFileSize();

                /** upload file in folder "mycustomfolder" */
                $result = $uploader->save($target_dir);
                $fileName = $uploader->getUploadedFileName();
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }

            $model = $this->_objectManager->create('CongHD\Uploadfile\Model\Filestatus');

            /*$data ->setStatus($status);
            $data ->setFileName(str_replace($target_dir,"",$target_file));

            */
            $data['file_status'] = $this->getRequest()->getParam('file_status') + 1;
            $data['file_name'] = $fileName;
            $data['user_name'] = "Admin";
            $data['store_name'] = "Admin";
            $data['ip_address'] = $_SERVER['REMOTE_ADDR'];;
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $data['date_uploaded'] = date("Y-m-d h:i:s");
            $data['file_size'] = round($fileSize/1024,0);
            $model->setData($data);

            try {

                $model->save();
                $data['file_status'] = $this->getRequest()->getParam('file_status') + 1;
                $this->messageManager->addSuccess(__('The Image has been uploaded.'));
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['file_id' => $model->getId(), '_current' => true]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while uploading the Image.'));
            }

            $this->_getSession()->setFormData($data);
            return $resultRedirect->setPath('*/*/edit', ['file_id' => $this->getRequest()->getParam('file_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}