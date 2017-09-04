<?php
namespace Magestore\Staff\Block;

use Magento\Framework\View\Element\Template;
use Magestore\Staff\Model\ResourceModel\Staff\CollectionFactory;
use Magento\Framework\ObjectManagerInterface;
use Magestore\Staff\Helper\Data;

class Staff extends Template {
    protected $_staffFactory;
    protected $_objectManager;
    protected $_dataHelper;

    public function __construct(
        Template\Context $context,
        CollectionFactory $staffFactory,
        ObjectManagerInterface $objectManager,
        Data $dataHelper,
        array $data = []
    ){
        parent::__construct($context, $data);
        $this->_staffFactory=$staffFactory;
        $this->_objectManager=$objectManager;
        $this ->_dataHelper = $dataHelper;
    }

    public function getBaseURLMedia(){
        $media=$this->_objectManager->get("Magento\Store\Model\StoreManagerInterface")
            ->getStore()
            ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
        return $media;
    }

    public function getStaffList() {
        $model=$this->_staffFactory->create();
        $staffs= $model -> setCurPage($this -> getCurrentPage())
                        -> setPageSize($this -> _dataHelper ->getStaffPerPage());
        return $staffs;
    }

    public function getCurrentPage(){
        $request = $this -> getRequest();
        if($request -> getParam('p')){
            $page = $request -> getParam('page');
        }else {
            $page = 1;
        }
        return $page;
    }

    public function getPager(){
        $pager = $this -> getChildBlock('staff_list_pager');
        $staffPerPage = $this ->_dataHelper -> getStaffPerPage();
        $pager -> setTemplate("Magestore_Staff::pager.phtml");
        $pager->setPageVarName('page');
        $collection = $this -> getStaffList();
        $pager -> setAvailableLimit([$staffPerPage=>$staffPerPage]);
        $pager -> setTotalNum($collection -> getSize());
        $pager -> setCollection($collection);
        $pager -> setShowPerPage(TRUE);
        return $pager -> toHtml();
    }

    public function getPerPageItem(){
        return $this -> _scopeConfig -> getValue('staff/view/items_per_page',\Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    public function checkModuleEnable(){
        if($this -> _dataHelper -> isEnable() == 0){
            return false;
        }else {
            return true;
        }
    }

}