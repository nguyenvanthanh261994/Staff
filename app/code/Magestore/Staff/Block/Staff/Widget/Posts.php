<?php
namespace Magestore\Staff\Block\Staff\Widget;

use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;
use Magestore\Staff\Model\ResourceModel\Staff\CollectionFactory;
use Magento\Framework\ObjectManagerInterface;

class Posts extends Template implements BlockInterface {
    protected $_staffFactory;
    protected $_objectManager;
    protected $_template = 'widget/posts.phtml';

    public function __construct(
        Template\Context $context,
        CollectionFactory $staffFactory,
        ObjectManagerInterface $objectManager,
        array $data = []
    )
    {
        $this -> _objectManager = $objectManager;
        $this -> _staffFactory = $staffFactory;
        parent::__construct($context, $data);
    }

    protected function _beforeToHtml()
    {
        $ids = explode(',', $this -> getData('recordshow'));
        $model = $this -> _staffFactory -> create();
        $staffs = $model -> addFieldToFilter('status',['eq' => true])
                -> addFieldToFilter('id', ['in' =>$ids])
                -> getData();
        $this -> setData('staffs',$staffs);
        $this -> getData('recordshow');
        return parent::_beforeToHtml();

    }

    public function getBaseUrlMedia() {
        $media = $this -> _objectManager -> get("
            Magento\Store\Model\StoreManagerInterface")
            -> getStore()
            -> getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
        return $media;
    }
}