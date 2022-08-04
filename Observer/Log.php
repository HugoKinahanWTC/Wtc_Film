<?php

declare(strict_types=1);

namespace Wtc\Film\Observer;

use Psr\Log\LoggerInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Wtc\Film\Controller\Repository\Film;

class Log implements ObserverInterface
{

    private Film $films;

    private LoggerInterface $logger;


    public function __construct(
        Film $films,
        LoggerInterface $logger
    ) {
        $this->logger = $logger;
        $this->films = $films;
    }

    public function execute(Observer $observer)
    {

        $films = $this->films->getFilmsFromRepository();

        /** @var \Magento\Customer\Model\Data\Customer $customer */
        $customer = $observer->getData('customer');
        $customer = $customer->getCustomAttributes();
        var_dump($customer['favourite_film']->getValue());

        foreach ($films as $film) {
            if ($film['film_id'] == $customer['favourite_film']->getValue
                ()){
                $this->logger->critical(
                    $film['title']
                );
            }
        };
    }
}
