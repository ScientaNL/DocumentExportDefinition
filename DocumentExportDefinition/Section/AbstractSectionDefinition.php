<?php
namespace DocumentExportDefinition;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\Discriminator(field = "type", map = {
 *    "DocumentExportDefinition\Section\Data\TOCDefinition": "DocumentExportDefinition\Section\Data\TOCDefinition",
 *    "DocumentExportDefinition\Section\Html\HtmlDefinition": "DocumentExportDefinition\Section\Html\HtmlDefinition",
 *    "DocumentExportDefinition\Section\Html\HtmlImageDefinition": "DocumentExportDefinition\Section\Html\HtmlImageDefinition"
 * })
 */
abstract class AbstractSectionDefinition
{
	/**
	 * @Serializer\SerializedName("title")
	 * @Serializer\Type("string")
	 * @var string
	 */
	protected $title;

	/**
	 * @Serializer\SerializedName("contents")
	 * @Serializer\Type("string")
	 * @var string
	 */
	protected $contents;

	/**
	 * @Serializer\SerializedName("anchor")
	 * @Serializer\Type("string")
	 * @var string
	 */
	protected $anchor;

	/**
	 * AbstractSectionDefinition constructor.
	 * @param null $title
	 * @param null $contents
	 */
	public function __construct($title = null, $contents = null)
	{
		$this->title = $title;
		$this->contents = $contents;
	}

	/**
	 * @Serializer\VirtualProperty
	 * @Serializer\SerializedName("type")
	 * @return string
	 */
	public function getType()
	{
		return static::class;
	}

	/**
	 * @param string $title
	 */
	public function setTitle($title)
	{
		$this->title = $title;
	}

	/**
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * @param string $contents
	 */
	public function setContents($contents)
	{
		$this->contents = $contents;
	}

	/**
	 * @return string
	 */
	public function getContents()
	{
		return $this->contents;
	}

	/**
	 * @param $anchor
	 */
	public function setAnchor($anchor)
	{
		$this->anchor = $anchor;
	}

	/**
	 * @return string
	 */
	public function getAnchor()
	{
		return $this->anchor;
	}
}
