<?php
namespace Magestore\Staff\Block\Adminhtml\Staff;
use Magento\Backend\Block\Widget\Form\Container;

class Edit extends Container{
	protected function _construct(){
		$this->_blockGroup="Magestore_Staff";
		$this->_controller="adminhtml_staff";
		$this->_objectId="id";
		parent::_construct();

        // add button
        $this -> buttonList -> update('save', 'label', __('Save'));
        $this -> buttonList -> add(
            'saveandcontinueedit',
            [
                'label' => __('Save and Continue Edit'),
                'class' => 'save',
                'data-attribute' => [
                    'mage-init' => [
                        'button' => [
                            'event' => 'saveAndContinueEdit',
                            'target' => '#edit_form'
                        ]
                    ]
                ]
            ],
            -100
        );

        $this -> buttonList -> update('delete', 'label', __("Delete"));
	}

	protected function _getSaveAndContinueEditUrl(){
	    return $this -> getUrl("staff/*/save", ["_current" => true, "back" => "edit", "active_tab" => ""]);
    }
}