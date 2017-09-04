<?php
namespace Magestore\Staff\Controller\Adminhtml\Index;

use Magento\Backend\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Ui\Component\MassAction\Filter;
use Magestore\Staff\Model\ResourceModel\Staff\CollectionFactory;

class MassDisable extends \Magento\Backend\App\Action {

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
            $item -> setStatus(0);
            $item -> save();
        }

        $this -> messageManager -> addSuccessMessage(__('A total of %1 records have been disabled', $numberRecord));
        return $this -> _redirect('*/*/');

    }
}