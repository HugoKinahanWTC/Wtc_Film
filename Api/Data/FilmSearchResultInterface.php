<?php

namespace Wtc\Film\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;
use Wtc\Film\Api\Data\FilmInterface;

interface FilmSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return FilmInterface[]
     */
    public function getItems();

    /**
     * @param array $items
     * @return void
     */
    public function setItems(array $items);
}
