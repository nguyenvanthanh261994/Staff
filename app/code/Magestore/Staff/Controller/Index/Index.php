<?php
namespace Magestore\Staff\Controller\Index;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;

class Index extends \Magento\Framework\App\Action\Action {
    public $_pageFactory;

    public function __construct(Context $context, PageFactory $pageFactory)
    {
        $this -> _pageFactory = $pageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $this ->_view -> getPage() -> getConfig() -> getTitle() -> set(__('Our Team'));
        $resultPage = $this -> _pageFactory -> create();
        return $resultPage;
    }
}