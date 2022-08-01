<?php

declare(strict_types=1);

namespace Wtc\Film\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Wtc\Film\Model\FilmFactory;
use Wtc\Film\Model\ResourceModel\Films\CollectionFactory;

class Films implements ArgumentInterface
{
    protected FilmFactory $filmFactory;

    protected CollectionFactory $collectionFactory;

    public function __construct(
        FilmFactory $filmFactory,
        CollectionFactory $collectionFactory
    ) {
        $this->filmFactory = $filmFactory;
        $this->collectionFactory = $collectionFactory;
    }

    public function getAllFilms() {
        return $this->collectionFactory->create();
    }

    public function getFilm($id) {
        $film = $this->filmFactory->create();
        $film->load($id);

        return $film;
    }

    public function getAllActiveFilms($status) {
        $films = $this->collectionFactory->create();
        $films->load($status);

        return $films;
    }

}
