<?php declare(strict_types=1);

namespace MacDisabledSantizeHtml;

use Shopware\Core\Framework\Plugin;
use Shopware\Core\Framework\Plugin\Context\ActivateContext;
use Shopware\Core\Framework\Plugin\Context\DeactivateContext;
class MacDisabledSantizeHtml extends Plugin
{
    public function activate(ActivateContext $activateContext): void
    {
        try {
            copy(
                __DIR__ . '/../../../../vendor/shopware/core/Framework/DataAbstractionLayer/Field/Flag/AllowHtml.php',
                __DIR__ . '/../../../../vendor/shopware/core/Framework/DataAbstractionLayer/Field/Flag/AllowHtml.php.bk'
            );

            copy(
                __DIR__ . '/Decorator/AllowHtml.txt',
                __DIR__ . '/../../../../vendor/shopware/core/Framework/DataAbstractionLayer/Field/Flag/AllowHtml.php'
            );
        } catch (\Exception $e) {
            // Do nothing
        }

        parent::activate($activateContext);
    }

    public function deactivate(DeactivateContext $deactivateContext): void
    {
        try {
            copy(
                __DIR__ . '/../../../vendor/shopware/core/Framework/DataAbstractionLayer/Field/Flag/AllowHtml.php.bk',
                __DIR__ . '/../../../vendor/shopware/core/Framework/DataAbstractionLayer/Field/Flag/AllowHtml.php'
            );
        } catch (\Exception $e) {
            // Do nothing
        }

        parent::deactivate($deactivateContext);
    }
}

