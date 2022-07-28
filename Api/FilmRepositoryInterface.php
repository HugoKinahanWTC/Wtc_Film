<?php

namespace Wtc\Film\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface FilmRepositoryInterface
{
    /**
     * @param int $id
     * @return \Wtc\Film\Api\Data\FilmInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id);

    /**
     * @param \Wtc\Film\Api\Data\FilmInterface $film
     * @return \Wtc\Film\Api\Data\FilmInterface
     */
    public function save(\Wtc\Film\Api\Data\FilmInterface $film);

    /**
     * @param \Wtc\Film\Api\Data\FilmInterface $film
     * @return void
     */
    public function delete(\Wtc\Film\Api\Data\FilmInterface $film);

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Wtc\Film\Api\Data\FilmSearchresultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Wtc\Film\Api\Data\FilmSearchresultInterface
     */
    public function getActiveFilms(SearchCriteriaInterface $searchCriteria);
}