<?php

declare(strict_types=1);

namespace Wtc\Film\Model;

use Magento\Framework\App\Config\ScopeConfigInterface as ScopeConfig;
use Magento\Store\Model\ScopeInterface;

class Config implements ConfigInterface
{
    protected ScopeConfig $scopeConfig;

    public function __construct(
        ScopeConfig $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    public function isFilmEnabled() : bool
    {
        return $this->scopeConfig->isSetFlag(self::XML_PATH_ENABLE_FILM,
            ScopeInterface::SCOPE_STORE);
    }

    public function isDebugEnabled() : bool
    {
        return $this->scopeConfig->isSetFlag(self::XML_PATH_ENABLE_DEBUG,
            ScopeInterface::SCOPE_STORE);
    }

    public function getFilmGenre() : string
    {
        return $this->scopeConfig->getValue(self::XML_PATH_FILM_GENRE,
            ScopeInterface::SCOPE_STORE);
    }

}

