<?php

namespace Wtc\Film\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface FilmSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return \Wtc\Film\Api\Data\FilmInterface[]
     */
    public function getItems();

    /**
     * @param \Wtc\Film\Api\Data\FilmInterface $items
     * @return void
     */
    public function setItems(array $items);
}
