<?php
/**
 * Copyright © MageKey. All rights reserved.
 * See LICENSE.txt for license details.
 */
namespace MageKey\XsdMerger\Model\XsdMerger\Config;

class Merger extends \Magento\Framework\Config\Dom
{
    /**
     * @var array
     */
    protected $_nonMatchedPatterns = [
        '/xs:schema/xs:include'
    ];
    
    /**
     * Getter for node by path
     *
     * @param string $nodePath
     * @throws \Magento\Framework\Exception\LocalizedException An exception is possible if original document contains
     *     multiple nodes for identifier
     * @return \DOMElement|null
     */
    protected function _getMatchedNode($nodePath)
    {
        foreach ($this->_nonMatchedPatterns as $pattern) {
            if (preg_match('#^' . $pattern . '$#', $nodePath)) {
                return null;
            }
        }

        return parent::_getMatchedNode($nodePath);
    }
}
