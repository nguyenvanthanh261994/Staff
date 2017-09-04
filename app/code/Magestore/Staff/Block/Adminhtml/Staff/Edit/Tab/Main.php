<?php
namespace Magestore\Staff\Block\Adminhtml\Staff\Edit\Tab;
use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\Registry;
use Magento\Framework\Data\FormFactory;
use Magestore\Staff\Model\Config\Status;
use Magento\Backend\Block\Widget\Tab\TabInterface;

class Main extends Generic implements TabInterface{
    protected $_staffStatus;
    public function __construct(
        Context $context,
        Registry $registry,
        FormFactory $formFactory,
        Status $status,
        array $data=[]){
        $this->_staffStatus=$status;
        parent::__construct($context,$registry,$formFactory,$data);
    }
    protected function _prepareForm(){
        $model=$this->_coreRegistry->registry("staff");
        $form=$this->_formFactory->create();

        $fieldset=$form->addFieldset(
            "base_fieldset",
            ["legend"=>__("General Information"),"class"=>"fieldset-wide"]
        );
        if($model->getId()){
            $fieldset->addField(
                "id",
                "hidden",
                ["name" => "id"]
            );
        }
        $fieldset->addField(
            "name",
            "text",
            [
                "name" => "name",
                "label" => __("Full Name"),
                "required" => true,
            ]
        );
        $fieldset->addField(
            "email",
            "text",
            [
                "name" => "email",
                "label" => __("Email"),
                "required" => true,
            ]
        );
        $fieldset->addField(
            "phone",
            "text",
            [
                "name" => "phone",
                "label" => __("Phone"),
                "required" => true,
            ]
        );
        $fieldset->addField(
            "position",
            "text",
            [
                "name" => "position",
                "label" => __("Position"),
                "required" => true,
            ]
        );
        $fieldset->addField(
            "status",
            "select",
            [
                "name" => "status",
                "label" => __("Options"),
                "required" => true,
                "options" => $this->_staffStatus->toOptionArray()
            ]
        );

        $data=$model->getData();
        $form->setValues($data);
        $this->setForm($form);
        return parent::_prepareForm();
    }
    public function getTabLabel(){
        return __("Main Information");
    }
    public function getTabTitle(){
        return __("Main Information");
    }
    public function canShowTab(){
        return true;
    }
    public function isHidden(){
        return false;
    }
}