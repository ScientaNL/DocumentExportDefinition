<?php

namespace DocumentExportDefinition\Section;

use JMS\Serializer\Annotation as Serializer;

/**
 * @psalm-template V as string|array|null
 * @Serializer\Discriminator(field = "objectType", map = {
 *    "String": "DocumentExportDefinition\Section\Data\StringDefinition",
 *    "File": "DocumentExportDefinition\Section\Data\FileDefinition",
 *    "Form": "DocumentExportDefinition\Section\Data\FormDefinition",
 *    "Docx": "DocumentExportDefinition\Section\Encoded\DocxDefinition",
 *    "Image": "DocumentExportDefinition\Section\Encoded\ImageDefinition",
 *    "Html": "DocumentExportDefinition\Section\Html\HtmlDefinition",
 *    "HtmlImage": "DocumentExportDefinition\Section\Html\HtmlImageDefinition",
 *    "RASCI": "DocumentExportDefinition\Section\Data\RASCIDefinition",
 *    "CategoryTrail": "DocumentExportDefinition\Section\Data\CategoryTrailDefinition",
 *    "BadgeCategoryTrail": "DocumentExportDefinition\Section\Data\BadgeCategoryTrailDefinition",
 *    "Tag": "DocumentExportDefinition\Section\Data\TagDefinition",
 *    "TOC": "DocumentExportDefinition\Section\Data\TOCDefinition",
 *    "WordTOC": "DocumentExportDefinition\Section\Data\WordTOCDefinition"
 * })
 */
abstract class AbstractDataDefinition
{
	/**
	 * @var V
	 * @Serializer\SerializedName("value")
	 * @Serializer\Type("string")
	 */
	protected $value;

	/**
	 * @var string|null
	 * @Serializer\SerializedName("title")
	 * @Serializer\Type("string")
	 */
	protected $title;

	/**
	 * @Serializer\VirtualProperty
	 * @Serializer\SerializedName("objectType")
	 * @Serializer\Type("string")
	 * @return string
	 */
	abstract public function getType(): string;

	/**
	 * @return V
	 */
	public function getValue()
	{
		return $this->value;
	}

	/**
	 * @param V $value
	 * @return $this
	 */
	public function setValue($value)
	{
		$this->value = $value;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * @param string $title
	 * @return $this
	 */
	public function setTitle(string $title)
	{
		$this->title = $title;
		return $this;
	}
}
