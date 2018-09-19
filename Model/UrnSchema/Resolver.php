<?php
/**
 * Copyright © MageKey. All rights reserved.
 * See LICENSE.txt for license details.
 */
namespace MageKey\XsdMerger\Model\UrnSchema;

class Resolver
{
    /**
     * @var Pool
     */
    protected $pool;

    /**
     * @var Merger
     */
    protected $merger;

    /**
     * @var array
     */
    protected $_resolved = [];

    /**
     * @param Pool $pool
     * @param Merger $merger
     */
    public function __construct(
        Pool $pool,
        Merger $merger
    ) {
        $this->pool = $pool;
        $this->merger = $merger;
    }

    /**
     * Retrieve schema
     *
     * @param string $schema
     * @return string
     */
    public function getSchema($schema)
    {
        if (isset($this->_resolved[$schema])) {
            return $this->_resolved[$schema];
        }

        $sourceSchema = $this->pool->getSource($schema);
        if ($sourceSchema) {
            $this->_resolved[$schema] = $this->merger->getMergedSchema($sourceSchema);
            if ($this->_resolved[$schema]) {
                $schema = $this->_resolved[$schema];
            }
        }

        return $schema;
    }
}
