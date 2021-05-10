<?php
namespace Henkelsoft\ProductShippingClass\Setup\Patch\Data;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class CreateDefaultShippingClasses implements DataPatchInterface {
    private $moduleDataSetup;

    public function __construct(ModuleDataSetupInterface $moduleDataSetup) {
        $this->moduleDataSetup = $moduleDataSetup;
    }

    /** @return string[]  */
    public function getAliases() {
        return [];
    }

    /** @return string[]  */
    public static function getDependencies() {
        return [];
    }

    /** @return $this  */
    public function apply() {

        /* this is lazy; you should probably grab all your product_ids */
        $shippingClasses = array_map(function () {return ['shipping_class' => rand(1, 20)];}, range(1, 20));
        $this->moduleDataSetup->getConnection()->insertMultiple('henkelsoft_product_shipping_class', $shippingClasses);
        return $this;
    }
}
