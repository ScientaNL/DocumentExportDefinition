<?php
namespace DocumentExportDefinition\Section;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\Discriminator(field = "objectType", map = {
 *    "String": "DocumentExportDefinition\Section\Data\StringDefinition",
 *    "PageNumber": "DocumentExportDefinition\Section\Data\PageNumberDefinition",
 *    "File": "DocumentExportDefinition\Section\Data\FileDefinition",
 *    "Docx": "DocumentExportDefinition\Section\Encoded\DocxDefinition",
 *    "Flowchart": "DocumentExportDefinition\Section\Encoded\FlowchartDefinition",
 *    "Image": "DocumentExportDefinition\Section\Encoded\ImageDefinition",
 *    "Html": "DocumentExportDefinition\Section\Html\HtmlDefinition",
 *    "HtmlImage": "DocumentExportDefinition\Section\Html\HtmlImageDefinition",
 *    "TOC": "DocumentExportDefinition\Section\Data\TOCDefinition"
 * })
 */
abstract class AbstractDataDefinition
{
    /**
     * @Serializer\SerializedName("value")
     * @Serializer\Type("string")
     * @var string
     */
    protected $value;

    /**
     * @Serializer\VirtualProperty
     * @Serializer\SerializedName("objectType")
     * @Serializer\Type("string")
     * @return string
     */
    abstract public function getType();

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
}
