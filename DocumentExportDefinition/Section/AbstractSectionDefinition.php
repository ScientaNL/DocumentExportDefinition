<?php
namespace DocumentExportDefinition\Section;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\Discriminator(field = "type", map = {
 *    "TOCDefinition": "DocumentExportDefinition\Section\Data\TOCDefinition",
 *    "HtmlDefinition": "DocumentExportDefinition\Section\Html\HtmlDefinition",
 *    "HtmlImageDefinition": "DocumentExportDefinition\Section\Html\HtmlImageDefinition"
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
