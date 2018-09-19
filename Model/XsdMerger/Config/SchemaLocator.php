<?php
/**
 * Copyright © MageKey. All rights reserved.
 * See LICENSE.txt for license details.
 */
namespace MageKey\XsdMerger\Model\XsdMerger\Config;

class SchemaLocator implements \Magento\Framework\Config\SchemaLocatorInterface
{
    /**
     * Get path to merged config schema
     *
     * @return false
     */
    public function getSchema()
    {
        return false;
    }

    /**
     * Get path to pre file validation schema
     *
     * @return false
     */
    public function getPerFileSchema()
    {
        return false;
    }
}
