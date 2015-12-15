<?php

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Model;

use Spryker\Zed\ProductOption\Persistence\ProductOptionQueryContainerInterface;
use Orm\Zed\ProductOption\Persistence\SpyProductOptionType;
use Orm\Zed\ProductOption\Persistence\SpyProductOptionValue;
use Spryker\Zed\ProductOption\Dependency\Facade\ProductOptionToProductInterface;
use Spryker\Zed\ProductOption\Dependency\Facade\ProductOptionToLocaleInterface;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\BatchProcessor\AbstractBatchProcessor;
use Spryker\Zed\ProductOption\Business\Model\DataImportWriter;

class BatchedDataImportWriter extends DataImportWriter
{

    /**
     * @var AbstractBatchProcessor
     */
    private $batchProcessor;

    /**
     * @param ProductOptionQueryContainerInterface $queryContainer
     * @param ProductOptionToProductInterface $productFacade
     * @param ProductOptionToLocaleInterface $localeFacade
     * @param AbstractBatchProcessor $batchProcessor
     */
    public function __construct(
        ProductOptionQueryContainerInterface $queryContainer,
        ProductOptionToProductInterface $productFacade,
        ProductOptionToLocaleInterface $localeFacade,
        AbstractBatchProcessor $batchProcessor
    ) {
        parent::__construct(
            $queryContainer,
            $productFacade,
            $localeFacade
        );

        $this->batchProcessor = $batchProcessor;
    }

    public function flushBuffer()
    {
        $this->batchProcessor->flush();
    }

    /**
     * @param SpyProductOptionType $productOptionTypeEntity
     * @param array $localizedNames
     */
    protected function createOrUpdateOptionTypeTranslations(SpyProductOptionType $productOptionTypeEntity, array $localizedNames)
    {
        if ($productOptionTypeEntity->getIdProductOptionType() === null) {
            $productOptionTypeEntity->save();
        }

        foreach ($localizedNames as $localeName => $localizedOptionTypeName) {
            if ($this->localeFacade->hasLocale($localeName) === false) {
                continue;
            }

            $localeTransfer = $this->localeFacade->getLocale($localeName);

            $this->batchProcessor->addValues(AbstractBatchProcessor::CACHE_KEY_OPTION_TYPE_TRANSLATION, [
                $localizedOptionTypeName,
                $localeTransfer->getIdLocale(),
                $productOptionTypeEntity->getIdProductOptionType(),
            ]);
        }
    }

    /**
     * @param SpyProductOptionValue $productOptionValueEntity
     * @param array $localizedNames
     */
    protected function createOrUpdateOptionValueTranslations(SpyProductOptionValue $productOptionValueEntity, array $localizedNames)
    {
        if ($productOptionValueEntity->getIdProductOptionValue() === null) {
            $productOptionValueEntity->save();
        }

        foreach ($localizedNames as $localeName => $localizedOptionValueName) {
            if ($this->localeFacade->hasLocale($localeName) === false) {
                continue;
            }

            $localeTransfer = $this->localeFacade->getLocale($localeName);

            $this->batchProcessor->addValues(AbstractBatchProcessor::CACHE_KEY_OPTION_VALUE_TRANSLATION, [
                $localizedOptionValueName,
                $localeTransfer->getIdLocale(),
                $productOptionValueEntity->getIdProductOptionValue(),
            ]);
        }
    }

    /**
     * @param int $idAbstractProduct
     */
    protected function touchAbstractProductById($idAbstractProduct)
    {
        static $touchedIds = [];

        if (in_array($idAbstractProduct, $touchedIds)) {
            return;
        }

        $this->batchProcessor->addValues(AbstractBatchProcessor::CACHE_KEY_TOUCH, [
             '0',
            'abstract_product',
            $idAbstractProduct,
            (new \DateTime())->format('Y-m-d H:i:s'),
        ]);

        $touchedIds[] = $idAbstractProduct;
    }

    /**
     * @param string $concreteSku
     */
    protected function touchAbstractProductByConcreteSku($concreteSku)
    {
        $idAbstractProduct = $this->productFacade->getAbstractProductIdByConcreteSku($concreteSku);
        $this->touchAbstractProductById($idAbstractProduct);
    }

}
