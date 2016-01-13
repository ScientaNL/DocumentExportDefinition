<?php
namespace DocumentExportDefinition\Section\Html;

use DocumentExportDefinition\Section\AbstractSectionDefinition;
use JMS\Serializer\Annotation as Serializer;

class HtmlDefinition extends AbstractSectionDefinition
{
	/**
	 * @Serializer\SerializedName("images")
	 * @Serializer\Type("array<string,DocumentExportDefinition\Section\Html\HtmlImageDefinition>")
	 * @var array
	 */
	protected $images = [];

	/**
	 * @Serializer\SerializedName("useStrictStyles")
	 * @Serializer\Type("boolean")
	 */
	protected $useStrictStyles = true;

	public function getType()
	{
		return 'HtmlDefinition';
	}

	/**
	 * @param HtmlImageDefinition $image
	 */
	public function addImage(HtmlImageDefinition $image)
	{
		$this->images[$image->getFileId()] = $image;
	}

	/**
	 * @return array
	 */
	public function getImages()
	{
		return $this->images;
	}

	public function setUseStrictStyles($useStrictStyles)
	{
		$this->useStrictStyles = $useStrictStyles;
	}

	public function getUseStrictStyles()
	{
		return $this->useStrictStyles;
	}
}
