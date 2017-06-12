<?php
namespace DocumentExportDefinition\Section;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\Discriminator(field = "objectType", map = {
 *    "FileDefinition": "DocumentExportDefinition\Section\Data\FileDefinition",
 *    "TOCDefinition": "DocumentExportDefinition\Section\Data\TOCDefinition",
 *    "DocxDefinition": "DocumentExportDefinition\Section\Encoded\DocxDefinition",
 *    "FlowchartDefinition": "DocumentExportDefinition\Section\Encoded\FlowchartDefinition",
 *    "ImageDefinition": "DocumentExportDefinition\Section\Encoded\ImageDefinition",
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
	 * @Serializer\SerializedName("orientation")
	 * @Serializer\Type("string")
	 * @var string
	 */
	protected $orientation;

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
	 * @Serializer\SerializedName("objectType")
	 * @Serializer\Type("string")
	 * @return string
	 */
	abstract public function getType();

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

    /**
     * @return string
     */
    public function getOrientation()
    {
        return $this->orientation;
    }

    /**
     * @param string $orientation
     */
    public function setOrientation($orientation)
    {
        $this->orientation = $orientation;
    }
}
