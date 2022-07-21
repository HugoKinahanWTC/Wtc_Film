<?php

declare(strict_types=1);

namespace Wtc\Film\Model;

interface ConfigInterface
{

    public const XML_PATH_ENABLE_FILM = 'film_config/general/enable_film';
    public const XML_PATH_ENABLE_DEBUG = 'film_config/general/enable_debug';
    public const XML_PATH_FILM_GENRE = 'film_config/general/film_genre';

    public function isFilmEnabled() : bool;

    public function isDebugEnabled() : bool;

    public function getFilmGenre() : ?string;
}
