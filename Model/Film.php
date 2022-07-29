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

    /**
     * @return mixed|string|null
     */
    public function getTitle() {
        return $this->_getData('title');
    }

    /**
     * @param string $title
     */
    public function setTitle($title) {
        $this->setTitle('title', $title);
    }

    /**
     * @return int|mixed|null
     */
    public function getStatus() {
        return $this->_getData('status');
    }

    /**
     * @param int $status
     */
    public function setStatus($status) {
        $this->setTitle('status', $status);
    }
}
