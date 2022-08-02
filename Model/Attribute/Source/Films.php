<?php

namespace Wtc\Film\Model\Attribute\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;
use Wtc\Film\Controller\Repository\Film;

class Films extends AbstractSource
{

    private Film $films;

    public function __construct(
        Film $films
    ) {
        $this->films = $films;
    }

    public function getAllOptions(): ?array
    {
        $films = $this->films->getFilmsFromRepository();
        $this->_options = [];
        foreach ($films as $film) {
                $this->_options[] =
                    [
                    'label' => __($film['title']),
                    'value' => $film['film_id']
                    ];
            }
        return $this->_options;
    }
}
