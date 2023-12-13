<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Glue\DocumentationGeneratorApi;

use Spryker\Glue\DocumentationGeneratorApi\DocumentationGeneratorApiDependencyProvider as SprykerDocumentationGeneratorApiDependencyProvider;
use Spryker\Glue\GlueApplication\Plugin\DocumentationGeneratorApi\RestApiSchemaFormatterPlugin;
use Spryker\Glue\DocumentationGeneratorOpenApi\Plugin\DocumentationGeneratorApi\DocumentationGeneratorOpenApiSchemaFormatterPlugin;
use Spryker\Glue\GlueJsonApiConvention\Plugin\DocumentationGeneratorApi\JsonApiSchemaFormatterPlugin;
use Spryker\Glue\DocumentationGeneratorApi\Expander\ContextExpanderCollectionInterface;
use Spryker\Glue\DocumentationGeneratorApiExtension\Dependency\Plugin\ContentGeneratorStrategyPluginInterface;
use Spryker\Glue\DocumentationGeneratorOpenApi\Plugin\DocumentationGeneratorApi\DocumentationGeneratorOpenApiContentGeneratorStrategyPlugin;
use Spryker\Glue\GlueBackendApiApplication\Plugin\GlueBackendApiApplication\BackendApiApplicationProviderPlugin;
use Spryker\Glue\GlueBackendApiApplication\Plugin\DocumentationGeneratorApi\BackendApiApplicationProviderPlugin as SprykerBackendApiApplicationProviderPlugin;
use Spryker\Glue\GlueStorefrontApiApplication\Plugin\GlueStorefrontApiApplication\StorefrontApiApplicationProviderPlugin;
use Spryker\Glue\GlueStorefrontApiApplication\Plugin\DocumentationGeneratorApi\StorefrontApiApplicationProviderPlugin as SprykerStorefrontApiApplicationProviderPlugin;

class DocumentationGeneratorApiDependencyProvider extends SprykerDocumentationGeneratorApiDependencyProvider
{
    /**
     * @return array<\Spryker\Glue\DocumentationGeneratorApiExtension\Dependency\Plugin\SchemaFormatterPluginInterface>
     */
    protected function getSchemaFormatterPlugins() : array
    {
        return [
            new RestApiSchemaFormatterPlugin(),
            new DocumentationGeneratorOpenApiSchemaFormatterPlugin(),
            new JsonApiSchemaFormatterPlugin(),
        ];
    }

    /**
     * @param \Spryker\Glue\DocumentationGeneratorApi\Expander\ContextExpanderCollectionInterface $contextExpanderCollection
     *
     * @return \Spryker\Glue\DocumentationGeneratorApi\Expander\ContextExpanderCollectionInterface
     */
    protected function getContextExpanderPlugins(ContextExpanderCollectionInterface $contextExpanderCollection) : ContextExpanderCollectionInterface
    {
        return $contextExpanderCollection;
    }

    /**
     * @throws \Spryker\Glue\DocumentationGeneratorApi\Exception\MissingContentGeneratorStrategyException
     *
     * @return \Spryker\Glue\DocumentationGeneratorApiExtension\Dependency\Plugin\ContentGeneratorStrategyPluginInterface
     */
    protected function getContentGeneratorStrategyPlugin() : ContentGeneratorStrategyPluginInterface
    {
        return new DocumentationGeneratorOpenApiContentGeneratorStrategyPlugin();
    }

    /**
     * @return array<\Spryker\Glue\DocumentationGeneratorApiExtension\Dependency\Plugin\ApiApplicationProviderPluginInterface>
     */
    protected function getApiApplicationProviderPlugins() : array
    {
        return [
            $this->getApiApplicationProviderPlugins(),
            new BackendApiApplicationProviderPlugin(),
            new SprykerBackendApiApplicationProviderPlugin(),
            new StorefrontApiApplicationProviderPlugin(),
            new SprykerStorefrontApiApplicationProviderPlugin(),
        ];
    }
}