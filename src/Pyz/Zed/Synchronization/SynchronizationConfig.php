<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Synchronization;

use Spryker\Zed\Synchronization\SynchronizationConfig as SprykerSynchronizationConfig;

class SynchronizationConfig extends SprykerSynchronizationConfig
{
    /**
     * @var string
     */
    public const PYZ_DEFAULT_SYNCHRONIZATION_POOL_NAME = 'synchronizationPool';
    /**
     * Specification:
     * - Disables Propel Instance Pooling for repository synchronization export if set to true.
     *
     * @api
     *
     * @return bool
     */
    public function isRepositorySyncExportPropelInstancePoolingDisabled() : bool
    {
        return true;
    }
}
