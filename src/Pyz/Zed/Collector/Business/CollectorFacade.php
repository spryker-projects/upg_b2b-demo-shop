<?php

namespace Pyz\Zed\Collector\Business;

use Generated\Shared\Transfer\LocaleTransfer;
use Orm\Zed\Touch\Persistence\SpyTouchQuery;
use Spryker\Zed\Collector\Business\CollectorFacade as SprykerCollectorFacade;
use Spryker\Zed\Collector\Business\Exporter\Writer\TouchUpdaterInterface;
use Spryker\Zed\Collector\Business\Exporter\Writer\WriterInterface;
use Spryker\Zed\Collector\Business\Model\BatchResultInterface;

/**
 * @method CollectorDependencyContainer getDependencyContainer()
 */
class CollectorFacade extends SprykerCollectorFacade
{

    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     * @param BatchResultInterface $result
     * @param $dataWriter
     * @param TouchUpdaterInterface $touchUpdater
     *
     * @return void
     */
    public function runSearchProductCollector(SpyTouchQuery $baseQuery, LocaleTransfer $locale, BatchResultInterface $result, $dataWriter, TouchUpdaterInterface $touchUpdater)
    {
        $this->getDependencyContainer()->createSearchProductCollector()->run($baseQuery, $locale, $result, $dataWriter, $touchUpdater);
    }

    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     * @param BatchResultInterface $result
     * @param $dataWriter
     * @param TouchUpdaterInterface $touchUpdater
     *
     * @return void
     */
    public function runStorageCategoryNodeCollector(SpyTouchQuery $baseQuery, LocaleTransfer $locale, BatchResultInterface $result, $dataWriter, TouchUpdaterInterface $touchUpdater)
    {
        $this->getDependencyContainer()->createStorageCategoryNodeCollector()->run($baseQuery, $locale, $result, $dataWriter, $touchUpdater);
    }

    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     * @param BatchResultInterface $result
     * @param $dataWriter
     * @param TouchUpdaterInterface $touchUpdater
     *
     * @return void
     */
    public function runStorageNavigationCollector(SpyTouchQuery $baseQuery, LocaleTransfer $locale, BatchResultInterface $result, $dataWriter, TouchUpdaterInterface $touchUpdater)
    {
        $this->getDependencyContainer()->createStorageNavigationCollector()->run($baseQuery, $locale, $result, $dataWriter, $touchUpdater);
    }

    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     * @param BatchResultInterface $result
     * @param $dataWriter
     * @param TouchUpdaterInterface $touchUpdater
     *
     * @return void
     */
    public function runStoragePageCollector(SpyTouchQuery $baseQuery, LocaleTransfer $locale, BatchResultInterface $result, $dataWriter, TouchUpdaterInterface $touchUpdater)
    {
        $this->getDependencyContainer()->createStoragePageCollector()->run($baseQuery, $locale, $result, $dataWriter, $touchUpdater);
    }

    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     * @param BatchResultInterface $result
     * @param $dataWriter
     * @param TouchUpdaterInterface $touchUpdater
     *
     * @return void
     */
    public function runStorageProductCollector(SpyTouchQuery $baseQuery, LocaleTransfer $locale, BatchResultInterface $result, $dataWriter, TouchUpdaterInterface $touchUpdater)
    {
        $this->getDependencyContainer()->createStorageProductCollector()->run($baseQuery, $locale, $result, $dataWriter, $touchUpdater);
    }

    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     * @param BatchResultInterface $result
     * @param $dataWriter
     * @param TouchUpdaterInterface $touchUpdater
     *
     * @return void
     */
    public function runStorageRedirectCollector(SpyTouchQuery $baseQuery, LocaleTransfer $locale, BatchResultInterface $result, $dataWriter, TouchUpdaterInterface $touchUpdater)
    {
        $this->getDependencyContainer()->createStorageRedirectCollector()->run($baseQuery, $locale, $result, $dataWriter, $touchUpdater);
    }

    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     * @param BatchResultInterface $result
     * @param $dataWriter
     * @param TouchUpdaterInterface $touchUpdater
     *
     * @return void
     */
    public function runStorageTranslationCollector(SpyTouchQuery $baseQuery, LocaleTransfer $locale, BatchResultInterface $result, $dataWriter, TouchUpdaterInterface $touchUpdater)
    {
        $this->getDependencyContainer()->createStorageTranslationCollector()->run($baseQuery, $locale, $result, $dataWriter, $touchUpdater);
    }

    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     * @param BatchResultInterface $result
     * @param $dataWriter
     * @param TouchUpdaterInterface $touchUpdater
     *
     * @return void
     */
    public function runStorageUrlCollector(SpyTouchQuery $baseQuery, LocaleTransfer $locale, BatchResultInterface $result, $dataWriter, TouchUpdaterInterface $touchUpdater)
    {
        $this->getDependencyContainer()->createStorageUrlCollector()->run($baseQuery, $locale, $result, $dataWriter, $touchUpdater);
    }

    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     * @param BatchResultInterface $result
     * @param WriterInterface $dataWriter
     * @param TouchUpdaterInterface $touchUpdater
     *
     * @return void
     */
    public function runStorageBlockCollector(SpyTouchQuery $baseQuery, LocaleTransfer $locale, BatchResultInterface $result, WriterInterface $dataWriter, TouchUpdaterInterface $touchUpdater)
    {
        $this->getDependencyContainer()->createStorageBlockCollector()->run($baseQuery, $locale, $result, $dataWriter, $touchUpdater);
    }

}
