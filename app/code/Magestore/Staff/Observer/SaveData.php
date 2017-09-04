<?php
namespace Magestore\Staff\Observer;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;

class SaveData implements ObserverInterface {

    protected  $_logger;
    public function __construct(LoggerInterface $logger)
    {
        $this -> _logger = $logger;
    }

    public function execute(Observer $observer)
    {
        $model = $observer -> getModel();
        $this -> _logger -> info('Staff Edited: '.$model -> getName());
    }
}