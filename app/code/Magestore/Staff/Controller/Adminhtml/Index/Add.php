<?php
namespace Magestore\Staff\Controller\Adminhtml\Index;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Add extends \Magento\Backend\App\Action{
	protected $_resultPageFactory;
	const ADMIN_RESOURCE = 'Magestore_Staff::staff_save';

	public function __construct(Context $context, PageFactory $pageFactory){
		parent::__construct($context);
		$this->_resultPageFactory=$pageFactory;
	}
	public function execute(){
		return $this->_forward("edit");
	}
}