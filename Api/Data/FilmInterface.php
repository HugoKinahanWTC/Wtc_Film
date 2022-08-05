<?php

declare(strict_types=1);

namespace Wtc\Film\Api\Data;

interface FilmInterface
{

    public function getId();

    public function setId($id);

    public function getTitle(): string;

    public function setTitle($title);

    public function getStatus(): int;

    public function setStatus($status);
}
