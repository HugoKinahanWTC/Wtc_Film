<?php

namespace Wtc\Film\Model\Attribute\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;
use Wtc\Film\Api\FilmRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;

class Films extends AbstractSource
{

//    private FilmRepositoryInterface $filmRepository;
//    private SearchCriteriaBuilder $searchCriteriaBuilder;

//    /**
//     * Get all options
//     * @return array
//     */

//    public function __construct(
//        FilmRepositoryInterface $filmRepository,
//        SearchCriteriaBuilder   $searchCriteriaBuilder
//    ) {
//        $this->filmRepository = $filmRepository;
//        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
//    }

    public function getAllOptions()
    {
//        $criteria = $this->searchCriteriaBuilder->create();
//        $films = $this->filmRepository->getList($criteria);
//        $films = $films->getItems();
//
//        foreach ($films as $film) {
//            if (!$this->_options) {
//                $this->_options = [
//                    'label' => __($film['title']),
//                    'value' => $film['film_id']
//                ];
//            }
//        }

        if (!$this->_options) {
            $this->_options = [
                ['label' => __('The Shawshank Redemption'), 'value' => 'The Shawshank Redemption'],
                ['label' => __('Interstellar'), 'value' => 'Interstellar'],
                ['label' => __('Saving Private Ryan'), 'value' => 'Saving Private Ryan'],
                ['label' => __('The Lion King'), 'value' => 'The Lion King'],
                ['label' => __('Toy Story'), 'value' => 'Toy Story'],
                ['label' => __('Titanic'), 'value' => 'Titanic'],
            ];
        }
        return $this->_options;
    }
}
