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

class AddBio implements DataPatchInterface
{

    /** @var ModuleDataSetupInterface */
    private ModuleDataSetupInterface $moduleDataSetup;

    /** @var EavSetupFactory */
    private EavSetupFactory $eavSetupFactory;

    /** @var EavConfig */
    private Config $eavConfig;

    /** @var AttributeResource */
    private AttributeResource $attributeResource;

    public function __construct(
        EavSetupFactory $eavSetupFactory,
        Config $eavConfig,
        ModuleDataSetupInterface $moduleDataSetup,
        AttributeResource $attributeResource
    )
    {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->eavConfig = $eavConfig;
        $this->moduleDataSetup = $moduleDataSetup;
        $this->attributeResource = $attributeResource;
    }

    public function apply()
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);

        $eavSetup->addAttribute(
            \Magento\Customer\Model\Customer::ENTITY,
            'customer_bio',
            [
                'type'         => 'varchar',
                'label'        => 'Bio',
                'input'        => 'text',
                'required'     => false,
                'visible'      => true,
                'user_defined' => true,
                'system'       => 0,
            ]
        );
        $customerBioAttribute = $this->eavConfig->getAttribute
        (Customer::ENTITY, 'customer_bio');

        // add to forms
        $customerBioAttribute->setData(
            'used_in_forms',
            ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']
        );

        // save
        $this->attributeResource->save($customerBioAttribute);
    }

    public static function getDependencies(): array {
        return [];
    }

    public function getAliases(): array {
        return [];
    }
}
