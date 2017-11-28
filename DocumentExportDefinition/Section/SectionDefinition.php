<?php

namespace DocumentExportDefinition\Section;

use JMS\Serializer\Annotation as Serializer;

class SectionDefinition
{
	const OPTION_ANCHOR = 'anchor';
	const OPTION_USE_STRICT_STYLES = 'useStrictStyles';
	const OPTION_ORIENTATION = 'orientation';
	const OPTION_NEXT_SECTION_ORIENTATION = 'nextSectionOrientation';

	/**
	 * @Serializer\SerializedName("variables")
	 * @Serializer\Type("array<string, DocumentExportDefinition\Section\AbstractDataDefinition>")
	 */
	protected $variables;

	/**
	 * @Serializer\SerializedName("categoryTrail")
	 * @Serializer\Type("array")
	 * @var array
	 */
	protected $categoryTrail;


	/**
	 * @Serializer\SerializedName("options")
	 * @Serializer\Type("array")
	 * @var array
	 */
	protected $options = [
		self::OPTION_ANCHOR => null,
		self::OPTION_USE_STRICT_STYLES => null,
		self::OPTION_ORIENTATION => null,
		self::OPTION_NEXT_SECTION_ORIENTATION => null
	];

	/**
	 * @Serializer\SerializedName("images")
	 * @Serializer\Type("array<string>")
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
	 * @return $this
	 */
	public function setTitle($title)
	{
		$this->title = $title;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * @param $variables
	 * @return $this
	 */
	public function setVariables($variables)
	{
		$this->variables = $variables;
		return $this;
	}

	/**
	 * @return array
	 */
	public function getVariables()
	{
		return $this->variables;
	}

	/**
	 * @param $option
	 * @param $value
	 * @return $this
	 */
	public function setOption($option, $value)
	{
		$this->options[$option] = $value;
		return $this;
	}

	/**
	 * @param $option
	 * @return bool|mixed
	 */
	public function getOption($option)
	{
		if (array_key_exists($option, $this->options) === false) {
			return false;
		}

		return $this->options[$option];
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
	 * @return $this
	 */
	public function setImages($images)
	{
		$this->images = $images;
		return $this;
	}

	/**
	 * @return array
	 */
	public function getCategoryTrail()
	{
		return $this->categoryTrail;
	}

	/**
	 * @param array $categoryTrail
	 * @return SectionDefinition
	 */
	public function setCategoryTrail(array $categoryTrail)
	{
		$this->categoryTrail = $categoryTrail;
		return $this;
	}
}
