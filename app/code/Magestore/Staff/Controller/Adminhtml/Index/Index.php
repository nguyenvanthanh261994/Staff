<?php
namespace Magestore\Staff\Controller\Adminhtml\Index;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action{
	protected $_resultPageFactory;

	public function __construct(Context $context, PageFactory $pageFactory){
		parent::__construct($context);
		$this->_resultPageFactory=$pageFactory;
	}
	public function execute(){
		$resultPage=$this->_resultPageFactory->create();
		$resultPage->setActiveMenu("Magestore_Staff::staff");
		$resultPage->getConfig()->getTitle()->prepend(__("Staff Manager"));


//        $name=["Nguyen Van Teo","Nguyen Van Tun","Tran Van Tung","Truong Hoai Lam","Tran Quang Phong"];
//                $email=["vanteo@gmail.com","vantun@yahoo.com","tungtran@gmail.com","hoailam@gmail.com","quangphong@yahoo.com"];
//                $phone=["0903354595","0999351247","113","1174","1154"];
//                $position=["Director","Worker","Shipper","Support","Shipper"];
//                $avatar=["staff/abc.jpg","staff/bcd.jpg","staff/cde.jpg","staff/def.jpg","staff/efi.jpg"];
//                for($i=0;$i<5;$i++){
//                    $staffModel=$this->_objectManager->create("Magestore\Staff\Model\Staff");
//                    $staffModel->addData([
//                        "name" => $name[$i],
//                        "email" => $email[$i],
//                        "phone" => $phone[$i],
//                        "position" => $position[$i],
//                        "avatar" => $avatar[$i],
//                        "status" => rand(0,1),
//                    ])->save();
//                }

		return $resultPage;
	}
}