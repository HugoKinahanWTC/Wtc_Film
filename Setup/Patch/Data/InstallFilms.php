<?php

declare(strict_types=1);

namespace Wtc\Film\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class InstallFilms implements DataPatchInterface
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
            ['title' => 'The Shawshank Redemption', 'status' => true],
            ['title' => 'Interstellar', 'status' => true],
            ['title' => 'Saving Private Ryan', 'status' => true],
            ['title' => 'The Lion King', 'status' => true],
            ['title' => 'Toy Story', 'status' => true]
        ];
        $this->moduleDataSetup->getConnection()->startSetup();
        $this->moduleDataSetup->getConnection()->insertMultiple(
            $this->moduleDataSetup->getTable('film_list'), $data
        );
        $this->moduleDataSetup->getConnection()->endSetup();
    }

    public static function getDependencies(): array {
        return [];
    }

    public function getAliases(): array {
        return [];
    }
}
