<?php

declare(strict_types=1);

namespace Wtc\Film\Setup\Patch\Data;

use Magento\Customer\Model\Customer;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Eav\Model\Config;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Customer\Model\ResourceModel\Attribute as
    AttributeResource;
use Wtc\Film\Model\Attribute\Source\Films;

class AddFavouriteFilm implements DataPatchInterface
{
    private ModuleDataSetupInterface $moduleDataSetup;

    private EavSetupFactory $eavSetupFactory;

    private Config $eavConfig;

    private AttributeResource $attributeResource;

    public function __construct
    (
        EavSetupFactory $eavSetupFactory,
        Config $eavConfig,
        ModuleDataSetupInterface $moduleDataSetup,
        AttributeResource $attributeResource
    ) {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->eavConfig = $eavConfig;
        $this->moduleDataSetup = $moduleDataSetup;
        $this->attributeResource = $attributeResource;
    }

    public function apply(): void
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);

        $eavSetup->addAttribute(
            \Magento\Customer\Model\Customer::ENTITY,
            'favourite_film',
            [
                'type'         => 'varchar',
                'label'        => 'Favourite Film',
                'input'        => 'select',
                'source'       => Films::class,
                'required'     => true,
                'visible'      => true,
                'user_defined' => true,
                'system'       => 0
                ]
        );

        $attributeSetId = $eavSetup->getDefaultAttributeSetId(Customer::ENTITY);
        $attributeGroupId = $eavSetup->getDefaultAttributeGroupId(Customer::ENTITY);

        $favouriteFilmAttribute = $this->eavConfig->getAttribute(Customer::ENTITY, 'favourite_film');
        $favouriteFilmAttribute->setData('attribute_set_id', $attributeSetId);
        $favouriteFilmAttribute->setData('attribute_group_id', $attributeGroupId);

        // add to forms
        $favouriteFilmAttribute->setData(
            'used_in_forms',
            ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']
        );

        // save
        $this->attributeResource->save($favouriteFilmAttribute);
    }

    public static function getDependencies(): array
    {
        return [];
    }

    public function getAliases(): array
    {
        return [];
    }
}
