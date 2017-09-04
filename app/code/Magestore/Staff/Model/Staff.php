<?php
namespace Magestore\Staff\Model;
class Staff extends \Magento\Framework\Model\AbstractModel{
	protected function _construct(){
		$this->_init("Magestore\Staff\Model\ResourceModel\Staff");
	}
}