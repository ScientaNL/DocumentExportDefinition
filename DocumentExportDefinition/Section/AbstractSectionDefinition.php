<?php
namespace DocumentExportDefinition\Section;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\Discriminator(field = "objectType", map = {
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
abstract class AbstractSectionDefinition
{
	/**
	 * @Serializer\SerializedName("title")
	 * @Serializer\Type("array")
	 * @var string
	 */
	protected $title;

	/**
	 * @Serializer\SerializedName("contents")
	 * @Serializer\Type("array")
	 * @var string
	 */
	protected $contents;

	/**
	 * @Serializer\SerializedName("variables")
	 * @Serializer\Type("array")
	 * @var string
	 */
	protected $variables;

    /**
     * @Serializer\SerializedName("options")
     * @Serializer\Type("array")
     * @var string
     */
    protected $options;


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
	 * @param $variables
	 */
	public function setVariables($variables)
	{
		$this->variables = $variables;
	}

	/**
	 * @return string
	 */
	public function getVariables()
	{
		return $this->variables;
	}

    /**
     * @param $options
     */
    public function setOptions($options)
    {
        $this->options = $options;
    }

    /**
     * @return string
     */
    public function getOptions()
    {
        return $this->options;
    }
}
