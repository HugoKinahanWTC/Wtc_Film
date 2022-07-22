<?php

declare(strict_types=1);

namespace Wtc\Film\Model;

use Magento\Framework\Model\AbstractModel;

class Film extends AbstractModel
{
    // This is enough to have a functional model
    public function _construct()
    {
        $this->_init(\Wtc\Film\Model\ResourceModel\Film::class);
    }
}
