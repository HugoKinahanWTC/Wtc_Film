<?php

declare(strict_types=1);

namespace Wtc\Film\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;


class AddFilm implements DataPatchInterface
{

    protected ModuleDataSetupInterface $moduleDataSetup;

    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
    }

    public function apply()
    {
        $data = [
            ['title' => 'Titanic', 'status' => false]
        ];
        $this->moduleDataSetup->getConnection()->startSetup();
        $this->moduleDataSetup->getConnection()->insertMultiple(
            $this->moduleDataSetup->getTable('film_list'), $data
        );
        $this->moduleDataSetup->getConnection()->endSetup();
    }

    public static function getDependencies(): array {
        return [
            \Wtc\Film\Setup\Patch\Data\InstallFilms::class
        ];
    }

    public function getAliases(): array {
        return [];
    }
}
