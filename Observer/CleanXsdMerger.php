<?php
/**
 * Copyright © MageKey. All rights reserved.
 * See LICENSE.txt for license details.
 */
namespace MageKey\XsdMerger\Observer;

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Event\ObserverInterface;

use MageKey\XsdMerger\Model\UrnSchema\Merger;

class CleanXsdMerger implements ObserverInterface
{
    /**
     * @var \Magento\Framework\Filesystem\Directory\Write
     */
    protected $varDirectory;

    /**
     * @param \Magento\Framework\Filesystem $filesystem
     */
    public function __construct(
        \Magento\Framework\Filesystem $filesystem
    ) {
        $this->varDirectory = $filesystem->getDirectoryWrite(DirectoryList::VAR_DIR);
    }

    /**
     * Remove xsd merger
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $this->varDirectory->delete(Merger::XSD_MERGER);
    }
}
