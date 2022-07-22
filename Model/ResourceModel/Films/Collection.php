<?php

declare(strict_types=1);

namespace Wtc\Film\Model\ResourceModel\Films;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    public function _construct()
    {
        $this->_init(\Wtc\Film\Model\Film::class,
            \Wtc\Film\Model\ResourceModel\Film::class);
    }
}
