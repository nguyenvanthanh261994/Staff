<?php
namespace Magestore\Staff\Model\ResourceModel\Staff;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection {
	protected $_idFieldName = 'id';
    protected function _construct(){
		$this->_init("Magestore\Staff\Model\Staff","Magestore\Staff\Model\ResourceModel\Staff");
	}
}