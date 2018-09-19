<?php
/**
 * Copyright © MageKey. All rights reserved.
 * See LICENSE.txt for license details.
 */
namespace MageKey\XsdMerger\Plugin;

use MageKey\XsdMerger\Model\UrnSchema\Resolver;

class UrnResolver
{
    /**
     * @var Resolver
     */
    private $urnSchemaResolver;

    /**
     * @param Resolver $urnSchemaResolver
     */
    public function __construct(
        Resolver $urnSchemaResolver
    ) {
        $this->urnSchemaResolver = $urnSchemaResolver;
    }

    /**
     * @param \Magento\Framework\Config\Dom\UrnResolver $subject
     * @param string $schema
     * @return array
     */
    public function beforeGetRealPath(
        \Magento\Framework\Config\Dom\UrnResolver $subject,
        $schema
    ) {
        $schema = $this->urnSchemaResolver->getSchema($schema);
        return [$schema];
    }
}
