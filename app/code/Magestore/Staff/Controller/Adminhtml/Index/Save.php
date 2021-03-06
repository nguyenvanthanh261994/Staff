<?php
namespace Magestore\Staff\Controller\Adminhtml\Index;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magestore\Staff\Model\StaffFactory;
use Magento\Framework\Registry;

class Save extends \Magento\Backend\App\Action{
    protected $_resultPageFactory;
    protected $_staffFactory;
    protected $_coreRegistry;
    const ADMIN_RESOURCE = 'Magestore_Staff::staff_save';

    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        StaffFactory $staffFactory,
        Registry $registry
    )
    {
        parent::__construct($context);
        $this->_resultPageFactory=$pageFactory;
        $this->_staffFactory=$staffFactory;
        $this->_coreRegistry = $registry;
    }

    public function execute(){
        $request=$this->getRequest();
        $isDelete=0;

        if($request->getPost()){
            $staffModel=$this->_staffFactory->create();
            $staffId=$request->getParam("id");
            $formData=$request->getPostValue();
            $urlRedirect="*/*/add";
            if($staffId){
                $staffModel->load($staffId);
                $urlRedirect="*/*/edit/id/".$staffModel->getId();
                if(isset($formData['avatar']['delete'])){
                    $isDelete=$formData['avatar']['delete'];
                }
                unset($formData['avatar']);
            }
            $staffModel->setData($formData);

            $formFile=$request->getFiles()->toArray();
            if($formFile['avatar']['name']){

                $imageHelper=$this->_objectManager->get("Magestore\Staff\Helper\Image");
                $imageFile=$imageHelper->uploadImage("avatar");
                if($imageFile){
                    if($isDelete == 1){
                        $imageHelper->removeImage($staffModel->getAvatar());
                    }
                    $staffModel->setAvatar("staff/$imageFile");
                }else{
                    $this->messageManager->addErrorMessage(__("Can not upload avatar, please try again"));

                    if($staffId){
                        return $this->_redirect($urlRedirect);
                    }else{
                        $this->_getSession()->setFormData($formData);
                        return $this->_redirect($urlRedirect);
                    }
                }
            }else{
                if(!$staffId){
                    $this->messageManager->addErrorMessage(__("You must upload staff avatar"));
                    $this->_getSession()->setFormData($formData);
                    return $this->_redirect($urlRedirect);
                }
            }

            $staffModel->save();

            $this -> _eventManager -> dispatch('staff_savedata', ['model' => $staffModel]);

            $this->messageManager->addSuccessMessage(__("The staff information has been saved"));

            $this->_getSession()->setFormData(false);
            if($request -> getParam('back')){
                return $this -> _redirect('*/*/edit', ['id' => $staffModel -> getId(), '_current' => true]);
            }
            return $this->_redirect('*/*/');
        }

    }
}