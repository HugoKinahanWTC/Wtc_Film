<?php

declare(strict_types=1);

namespace Wtc\Film\Model;

use Magento\Framework\Model\AbstractModel;
use Wtc\Film\Api\Data\FilmInterface;

class Film extends AbstractModel implements FilmInterface
{
    // This is enough to have a functional model
    public function _construct()
    {
        $this->_init(\Wtc\Film\Model\ResourceModel\Film::class);
    }

    public function getTitle(): string
    {
        return $this->_getData('title');
    }

    public function setTitle($title): string
    {
        $this->setTitle('title', $title);
    }

    public function getStatus() : int
    {
        return $this->_getData('status');
    }

    public function setStatus($status)
    {
        $this->setTitle('status', $status);
    }
}
