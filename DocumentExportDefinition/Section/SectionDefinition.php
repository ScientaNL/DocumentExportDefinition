<?php

namespace DocumentExportDefinition\Section;

use JMS\Serializer\Annotation as Serializer;
use DocumentExportDefinition\Section\AbstractDataDefinition;

class SectionDefinition
{
	/**
	 * @Serializer\SerializedName("title")
	 * @Serializer\Type("DocumentExportDefinition\Section\AbstractDataDefinition")
	 */
	protected $title;

	/**
	 * @Serializer\SerializedName("contents")
	 * @Serializer\Type("DocumentExportDefinition\Section\AbstractDataDefinition")
	 */
	protected $contents;

	/**
	 * @Serializer\SerializedName("variables")
	 * @Serializer\Type("array<DocumentExportDefinition\Section\AbstractDataDefinition>")
	 */
	protected $variables;

    /**
     * @Serializer\SerializedName("options")
     * @Serializer\Type("array")
     */
    protected $options;

    /**
     * @Serializer\SerializedName("images")
     * @Serializer\Type("array<AbstractEncodedDataDefinition>")
     */
    protected $images;


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
     * @return mixed
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @return mixed
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param mixed $images
     */
    public function setImages($images)
    {
        $this->images = $images;
    }
}
