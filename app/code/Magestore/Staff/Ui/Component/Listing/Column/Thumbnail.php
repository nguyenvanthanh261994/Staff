<?php
namespace Magestore\Staff\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\View\Element\UiComponent\ContextInterface;

class Thumbnail extends \Magento\Ui\Component\Listing\Columns\Column
{
    protected $_storeManager;

    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        \Magento\Framework\UrlInterface $urlBuilder,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        array $components = [],
        array $data = []
    ) {
        parent::__construct($context, $uiComponentFactory, $components, $data);
        $this->urlBuilder = $urlBuilder;
        $this -> _storeManager = $storeManager;
    }

    public function prepareDataSource(array $dataSource)
    {
//        if (isset($dataSource['data']['items'])) {
//            $fieldName = $this->getData('name');
//            foreach ($dataSource['data']['items'] as & $item) {
//                $product = new \Magento\Framework\DataObject($item);
//                $imageHelper = $this->imageHelper->init($product, 'product_listing_thumbnail');
//                $item[$fieldName . '_src'] = $imageHelper->getUrl();
//                $item[$fieldName . '_alt'] = $this->getAlt($item) ?: $imageHelper->getLabel();
//                $item[$fieldName . '_link'] = $this->urlBuilder->getUrl(
//                    'catalog/product/edit',
//                    ['id' => $product->getEntityId(), 'store' => $this->context->getRequestParam('store')]
//                );
//                $origImageHelper = $this->imageHelper->init($product, 'product_listing_thumbnail_preview');
//                $item[$fieldName . '_orig_src'] = $origImageHelper->getUrl();
//            }
//        }
        if(isset($dataSource['data']['items'])){
            $fieldName = $this -> getData('name');
            foreach ($dataSource['data']['items'] as & $item) {
                $urlMedia = $this -> _storeManager -> getStore() -> getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
                $item[$fieldName.'_src'] = $urlMedia.$item[$fieldName];
                $item[$fieldName.'_alt'] = $item['name'];
                $item[$fieldName.'_link'] = $this ->urlBuilder->getUrl(
                    'staff/index/edit',
                    ['id' => $item['id']]
                );
                $item[$fieldName.'_orig_src'] = $urlMedia.$item[$fieldName];
            }
        }

        //\Zend_Debug::dump($dataSource);
       // exit();

        return $dataSource;
    }

}
