<?php
namespace Magestore\Staff\Block\Adminhtml\Staff\Edit\Tab;
use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;

class Avatar extends Generic implements TabInterface{

       protected function _prepareForm(){
        $model=$this->_coreRegistry->registry("staff");
        $form=$this->_formFactory->create();

        $fieldset = $form->addFieldset(
            "avatar_fieldset",
            ["legend"=>__("Upload Avatar"),"class"=>"fieldset-wide"]
        );

        $fieldset->addField(
               "avatar",
               "image",
               [
                   "name" => "avatar",
                   "label" => __("Avatar"),
                   "required" => true,
               ]
        );

        $data=$model->getData();
        $form->setValues($data);
        $this->setForm($form);
        return parent::_prepareForm();
    }

    public function getTabLabel()
    {
        // TODO: Implement getTabLabel() method.
        return __('Upload Avatar');
    }

    public function getTabTitle()
    {
        // TODO: Implement getTabTitle() method.
        return __('Upload Avatar');
    }

    public function canShowTab()
    {
        // TODO: Implement canShowTab() method.
        return true;
    }

    public function isHidden()
    {
        // TODO: Implement isHidden() method.
        return false;
    }
}