<?php
namespace Magestore\Staff\Controller\Adminhtml\Index;
class Delete extends \Magento\Backend\App\Action{
    const ADMIN_RESOURCE = 'Magestore_Staff::staff_delete';

    public function execute()
    {
        $id = $this -> getRequest() -> getParam('id');
        if($id){
            $model = $this -> _objectManager -> create('Magestore\Staff\Model\Staff');
            $model -> load($id);
            if($model -> getId()){
                // delete record
                $imageHelper=$this->_objectManager->get("Magestore\Staff\Helper\Image");
                $imageHelper->removeImage($model->getAvatar());
                $model -> delete();
                $this -> messageManager -> addSuccessMessage(__('This staff has been deleted'));
                return $this -> _redirect('*/*/');
            }else {
                $this->messageManager->addErrorMessage(__("This staff is no longer exist"));
                return $this->_redirect('*/*/');
            }
        }else {
            $this -> messageManager -> addErrorMessage(__("We can not find any id delete"));
            return $this -> _redirect('*/*/');
        }

    }
}