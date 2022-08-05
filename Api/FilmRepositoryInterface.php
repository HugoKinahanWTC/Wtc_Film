<?php

namespace Wtc\Film\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Wtc\Film\Api\Data\FilmInterface;
use Wtc\Film\Api\Data\FilmSearchResultInterface;

interface FilmRepositoryInterface
{

    public function getById($id): FilmInterface;

    public function save(FilmInterface $film): FilmInterface;

    public function delete(FilmInterface $film) : void;

    public function getList(SearchCriteriaInterface $searchCriteria):
    FilmSearchResultInterface;
}
