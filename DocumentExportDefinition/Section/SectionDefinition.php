<?php

namespace DocumentExportDefinition\Section;

use JMS\Serializer\Annotation as Serializer;
use DocumentExportDefinition\Section\Data\StringDefinition;


class SectionDefinition
{
	/**
	 * @Serializer\SerializedName("title")
	 * @Serializer\Type("AbstractDataDefinition")
	 * @var string
	 */
	protected $title;

	/**
	 * @Serializer\SerializedName("contents")
	 * @Serializer\Type("AbstractDataDefinition")
	 * @var string
	 */
	protected $contents;

	/**
	 * @Serializer\SerializedName("variables")
	 * @Serializer\Type("AbstractDataDefinition")
	 * @var string
	 */
	protected $variables;

    /**
     * @Serializer\SerializedName("options")
     * @Serializer\Type("AbstractDataDefinition")
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