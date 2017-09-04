<?php
namespace Magestore\Staff\Block\Adminhtml\Staff\Edit;
use Magento\Backend\Block\Widget\Form\Generic;
//use Magento\Backend\Block\Template\Context;
//use Magento\Framework\Registry;
//use Magento\Framework\Data\FormFactory;
//use QHO\Staff\Model\Config\Options;
//use Magento\Cms\Model\Wysiwyg\Config;
class Form extends Generic{
    /*protected $_staffStatus;
    protected $_editor;
    public function __construct(
                        Context $context,
                        Registry $registry,
                        FormFactory $formFactory,
                        Options $status,
                        Config $editor,
                        array $data){
        $this->_staffStatus=$status;
        $this->_editor=$editor;
        parent::__construct($context,$registry,$formFactory,$data);
    }*/
    protected function _construct(){
        $this->setId("staff_form");
        $this->setTitle(__("Staff Information"));
        parent::_construct();
    }
    protected function _prepareForm(){
        //$model=$this->_coreRegistry->registry("staff");
        $form=$this->_formFactory->create(
            [
                "data" => [
                    "id" => "edit_form",
                    "action" => $this->getData("action"),
                    "method" => "post",
                    "enctype" => "multipart/form-data"
                ]
            ]
        );

//        $data=$model->getData();
//        $form->setValues($data);
        $form->setHtmlIdPrefix("staff_main_");
        $form->setUseContainer(true);
        $this->setForm($form);
        return parent::_prepareForm();
    }
}