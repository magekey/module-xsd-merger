<?php
/**
 * Copyright © MageKey. All rights reserved.
 * See LICENSE.txt for license details.
 */
namespace MageKey\XsdMerger\Model\UrnSchema;

class Pool
{
    /**
     * @var array
     */
    protected $sources;

    /**
     * @param array $sources
     */
    public function __construct(
        array $sources = []
    ) {
        $this->sources = array_combine(array_values($sources), array_keys($sources));
    }

    /**
     * Retrieve schema source name
     *
     * @param string $schema
     * @return string|null
     */
    public function getSource($schema)
    {
        if (isset($this->sources[$schema])) {
            return $this->sources[$schema];
        }

        return null;
    }
}
