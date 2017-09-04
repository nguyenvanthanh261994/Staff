<?php
namespace Magestore\Staff\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper {
    const XML_PATH_ENABLE = 'staff/view/enable';
    const XML_PATH_ITEMS_PER_PAGE = 'staff/view/items_per_page';
    public function isEnable(){
        $this -> scopeConfig -> getValue(self::XML_PATH_ENABLE, \Magento\Store\Model\ScopeInterface::SCOPE_STORES);
    }

    public function getStaffPerPage(){
        return $this -> scopeConfig -> getValue(self::XML_PATH_ITEMS_PER_PAGE, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }


}