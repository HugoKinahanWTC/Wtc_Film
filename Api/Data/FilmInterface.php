<?php

namespace Wtc\Film\Api\Data;

interface FilmInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     * @return void
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @param string $title
     * @return void
     */
    public function setTitle($title);

    /**
     * @return int
     */
    public function getStatus();

    /**
     * @param int $status
     * @return void
     */
    public function setStatus($status);
}
