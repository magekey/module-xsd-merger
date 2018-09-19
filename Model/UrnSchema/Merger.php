<?php
/**
 * Copyright © MageKey. All rights reserved.
 * See LICENSE.txt for license details.
 */
namespace MageKey\XsdMerger\Model\UrnSchema;

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\ObjectManagerInterface;

class Merger
{
    /**
     * XSD Merger
     */
    const XSD_MERGER = 'xsd_merger';

    /**
     * @var \Magento\Framework\Filesystem\Directory\Write
     */
    protected $varDirectory;

    /**
     * @var ObjectManagerInterface
     */
    protected $readerFactory;

    /**
     * @param \Magento\Framework\Filesystem $filesystem
     * @param ObjectManagerInterface $readerFactory
     */
    public function __construct(
        \Magento\Framework\Filesystem $filesystem,
        ObjectManagerInterface $readerFactory
    ) {
        $this->varDirectory = $filesystem->getDirectoryWrite(DirectoryList::VAR_DIR);
        $this->readerFactory = $readerFactory;
    }

    /**
     * Retrieve merged schema
     *
     * @param string $sourceSchema
     * @return string|null
     */
    public function getMergedSchema($sourceSchema)
    {
        $mergedFilename = static::XSD_MERGER . '/' . $sourceSchema . '.xsd';
        $mergedPath = $this->varDirectory->getAbsolutePath($mergedFilename);
        if (is_file($mergedPath)) {
            return $mergedPath;
        }

        $content = $this->readMergedContent($mergedFilename);
        if (!empty($content)) {
            if (!$this->varDirectory->isWritable(static::XSD_MERGER)) {
                $this->varDirectory->create(static::XSD_MERGER);
            }
            $this->varDirectory->writeFile($mergedFilename, $content);
            return $mergedPath;
        }

        return null;
    }

    /**
     * Retrieve merged schema content
     *
     * @param string $fileName
     * @return string
     */
    protected function readMergedContent($fileName)
    {
        $reader = $this->readerFactory->create(
            'MageKey\XsdMerger\Model\XsdMerger\Config\Reader',
            [
                'fileName' => $fileName
            ]
        );

        $data = $reader->read();
        if (isset($data[0])) {
            return $data[0]->saveXML();
        }

        return '';
    }
}
