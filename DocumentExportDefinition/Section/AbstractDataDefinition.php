<?php
namespace DocumentExportDefinition\Section\Data;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\Discriminator(field = "type", map = {
 *    "StringDefinition" :  "DocumentExportDefinition\Section\Data\StringDefinition",
 *    "FileDefinition": "DocumentExportDefinition\Section\Data\FileDefinition",
 *    "TOCDefinition": "DocumentExportDefinition\Section\Data\TOCDefinition",
 *    "DocxDefinition": "DocumentExportDefinition\Section\Encoded\DocxDefinition",
 *    "FlowchartDefinition": "DocumentExportDefinition\Section\Encoded\FlowchartDefinition",
 *    "ImageDefinition": "DocumentExportDefinition\Section\Encoded\ImageDefinition",
 *    "HtmlDefinition": "DocumentExportDefinition\Section\Html\HtmlDefinition",
 *    "HtmlImageDefinition": "DocumentExportDefinition\Section\Html\HtmlImageDefinition"
 * })
 */
abstract class AbstractDataDefinition
{

    /**
     * @Serializer\SerializedName("value")
     * @Serializer\Type("object")
     */
    protected $value;

    /**
     * @Serializer\VirtualProperty
     * @Serializer\SerializedName("type")
     * @Serializer\Type("string")
     * @return string
     */
    abstract public function getType();
}
