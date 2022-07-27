<?php

namespace Wtc\Film\Model;

use Wtc\Film\Api\Data\FilmInterface;
use Magento\Framework\Model\AbstractModel;

class FilmDTO extends AbstractModel implements FilmInterface
{

    const TITLE = 'title';
    const STATUS = 'status';

    protected function _construct()
    {
        $this->_init(ResourceModel\Film::class);
    }

    public function getTitle() {
        return $this->_getData(self::TITLE);
    }

    public function setTitle($title) {
        $this->setData(self::TITLE);
    }

    public function getStatus() {
        return $this->_getData(self::STATUS);
    }

    public function setStatus($status) {
        $this->setData(self::STATUS);
    }
}
