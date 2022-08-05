<?php

declare(strict_types=1);

namespace Wtc\Film\Controller\Repository;

use Magento\ConfigurableProduct\Model\Product\Type\Configurable as ConfigurableProduct;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\RawFactory;
use Magento\Framework\Controller\ResultInterface;
use Wtc\Film\Api\Data\FilmSearchResultInterface;
use Wtc\Film\Api\FilmRepositoryInterface;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Api\SortOrderBuilder;

class Film implements HttpGetActionInterface
{

    private FilmRepositoryInterface $filmRepository;

    private SearchCriteriaBuilder $searchCriteriaBuilder;

    private FilterBuilder $filterBuilder;

    private RawFactory $rawFactory;

    private SortOrderBuilder $sortOrderBuilder;

    public function __construct(
        FilmRepositoryInterface $filmRepository,
        SearchCriteriaBuilder   $searchCriteriaBuilder,
        FilterBuilder           $filterBuilder,
        RawFactory              $rawFactory,
        SortOrderBuilder        $sortOrderBuilder
    ) {
        $this->filmRepository = $filmRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->filterBuilder = $filterBuilder;
        $this->rawFactory = $rawFactory;
        $this->sortOrderBuilder = $sortOrderBuilder;
    }

    public function execute() : ResultInterface
    {
        $response = $this->rawFactory->create();
        $films = $this->getFilmsFromRepository();
        $filmArray = [];
        foreach ($films as $film) {
            $filmArray[] = sprintf(
                "%s - %s (%d)\n",
                $film->getTitle(),
                $film->getId(),
                $film->getStatus());
        }
        return $response->setContents(implode('<br>', $filmArray));
    }

    public function getFilmsFromRepository(): array {
        $this->setFilmStatusFilter();
//        $this->setFilmTitleFilter();
//        $this->setFilmOrder();

        $criteria = $this->searchCriteriaBuilder->create();
        $films = $this->filmRepository->getList($criteria);
        return $films->getItems();
    }

    private function setFilmStatusFilter()
    {
        $configFilmFilter = $this->filterBuilder
            ->setField('status')
            ->setValue(1)
            ->create();
        $this->searchCriteriaBuilder->addFilters([$configFilmFilter]);
    }

    private function setFilmTitleFilter()
    {
        $titleFilter[] = $this->filterBuilder
            ->setField('title')
            ->setValue('T%')
            ->setConditionType('like')
            ->create();
        $this->searchCriteriaBuilder->addFilters($titleFilter);
    }

    private function setFilmOrder()
    {
        $sortOrder = $this->sortOrderBuilder
            ->setField('film_id')
            ->setDirection(SortOrder::SORT_DESC)
            ->create();
        $this->searchCriteriaBuilder->addSortOrder($sortOrder);
    }
}
