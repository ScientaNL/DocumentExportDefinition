<?php

namespace DocumentExportDefinition\Section;

use JMS\Serializer\Annotation as Serializer;

class SectionDefinition
{
	public const OPTION_ANCHOR = 'anchor';
	public const OPTION_ORIENTATION = 'orientation';
	public const OPTION_NEXT_SECTION_ORIENTATION = 'nextSectionOrientation';

	/**
	 * @Serializer\SerializedName("variables")
	 * @Serializer\Type("array<string, DocumentExportDefinition\Section\AbstractDataDefinition>")
	 * @var array
	 */
	protected $variables = [];

	/**
	 * @Serializer\SerializedName("categoryTrail")
	 * @Serializer\Type("array")
	 * @var array
	 */
	protected $categoryTrail = [];


	/**
	 * @Serializer\SerializedName("options")
	 * @Serializer\Type("array")
	 * @var array
	 */
	protected $options = [
		self::OPTION_ANCHOR => null,
		self::OPTION_ORIENTATION => null,
		self::OPTION_NEXT_SECTION_ORIENTATION => null
	];

	/**
	 * @Serializer\SerializedName("images")
	 * @Serializer\Type("array<string>")
	 * @var array
	 */
	protected $images = [];

	/**
	 * @param array $variables
	 * @return $this
	 */
	public function setVariables(array $variables)
	{
		$this->variables = $variables;
		return $this;
	}

	/**
	 * @return array
	 */
	public function getVariables(): array
	{
		return $this->variables;
	}

	/**
	 * @param string $option
	 * @param mixed $value
	 * @return $this
	 */
	public function setOption($option, $value)
	{
		$this->options[$option] = $value;
		return $this;
	}

	/**
	 * @param string $option
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
	 * @return array
	 */
	public function getImages()
	{
		return $this->images;
	}

	/**
	 * @param array $images
	 * @return $this
	 */
	public function setImages(array $images)
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
	 * @return $this
	 */
	public function setCategoryTrail(array $categoryTrail): self
	{
		$this->categoryTrail = $categoryTrail;
		return $this;
	}
}
