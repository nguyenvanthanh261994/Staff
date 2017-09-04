<?php
namespace Magestore\Staff\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Ui\Component\MassAction\Filter;
use Magestore\Staff\Model\ResourceModel\Staff\Collection;
use Magestore\Staff\Model\ResourceModel\Staff\CollectionFactory;

class MassDelete extends \Magento\Backend\App\Action {

    protected $_filter;
    protected $_collectionFactory;

    public function __construct(
        Context $context,
        Filter $filter,
        CollectionFactory $collection
    )
    {
        parent::__construct($context);
        $this -> _filter = $filter;
        $this -> _collectionFactory = $collection;
    }

    /**
     * Dispatch request
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        $collectObject = $this -> _collectionFactory -> create();
        $collection = $this -> _filter -> getCollection($collectObject);
        $imageHelper = $this -> _objectManager -> get('Magestore\Staff\Helper\Image');
        $numberRecord = $collection -> getSize();

        foreach ($collection as $item) {
            $imageHelper -> removeImage($item -> getAvatar());
            $item -> delete();
        }

        $this -> messageManager -> addSuccessMessage(__('A total of %1 records have been deleted', $numberRecord));
        return $this -> _redirect('*/*/');

    }
}