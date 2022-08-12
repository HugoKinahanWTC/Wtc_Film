<?php

declare(strict_types=1);

namespace Wtc\Film\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Customer\Model\Session;
use Wtc\Film\Controller\Repository\Film;

class Films implements ArgumentInterface
{
    protected Film $films;

    protected Session $session;

    public function __construct(
        Film    $films,
        Session $session
    ) {
        $this->films = $films;
        $this->session = $session;
    }

    public function getCustomerFavouriteFilm(): ?string
    {
        $customer = $this->session->getCustomer();
        if (!$customer) {
            return null;
        }
        $customerFavouriteFilm = $customer->getData('favourite_film');
        return $customerFavouriteFilm;
    }

    public function getAllActiveFilms(): array {
        return $this->films->getFilmsFromRepository();
    }
}
