<?php
namespace Magestore\Staff\Block\Adminhtml\Staff\Edit\Tab;
use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\Registry;
use Magento\Framework\Data\FormFactory;
use Magento\Cms\Model\Wysiwyg\Config;
use Magento\Backend\Block\Widget\Tab\TabInterface;

class Profile extends Generic implements TabInterface{
    protected $_editor;

    public function __construct(
        Context $context,
        Registry $registry,
        FormFactory $formFactory,
        Config $editor,
        array $data =[]
    )
    {
        $this->_editor = $editor;
        parent::__construct($context,$registry,$formFactory,$data);
    }

    protected function _prepareForm(){
        $model=$this->_coreRegistry->registry("staff");
        $form=$this->_formFactory->create();

        $fieldset = $form->addFieldset(
            "Profile_fieldset",
            ["legend"=>__("Staff Profile"),"class"=>"fieldset-wide"]
        );

        $editorConfig = $this -> _editor -> getConfig(
            [
                'add_variables' => false,
                'add_widgets' => false,
            ]
        );
        $fieldset->addField(
            'profile',
            'editor',
            [
                'name' => 'profile',
                'label' => __('Profile'),
                'config' => $editorConfig,
                'style' => 'height: 36em',
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
        return __('Staff Profile');
    }

    public function getTabTitle()
    {
        // TODO: Implement getTabTitle() method.
        return __('Staff Profile');
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