<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace YvesUnit\Spryker\Yves\Assets\Communication;

use Spryker\Yves\Assets\Communication\Model\UrlParameterCacheBuster;

class UrlParameterCacheBusterTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @group Asset
     */
    public function testStringCacheAdded()
    {
        $cacheBust = 'foo';
        $provider = new UrlParameterCacheBuster($cacheBust);

        $this->assertEquals('bar.css?v=foo', $provider->addCacheBust('bar.css'));
    }

    /**
     * @group Asset
     */
    public function testTimeCacheAdded()
    {
        $cacheBust = microtime();
        $provider = new UrlParameterCacheBuster($cacheBust);

        $this->assertEquals('bar.css?v=' . (string) $cacheBust, $provider->addCacheBust('bar.css'));
    }

}
