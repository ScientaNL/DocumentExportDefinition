<?php
namespace DocumentExportDefinition\Section\Html;

use DocumentExportDefinition\Section\AbstractSectionDefinition;

class HtmlDefinition extends AbstractSectionDefinition
{
	/**
	 * @Serializer\SerializedName("images")
	 * @Serializer\Type("array<string,DocumentExportDefinition\HtmlImageDefinition>")
	 * @var array
	 */
	protected $images = [];

	public function getType()
	{
		return 'HtmlDefinition';
	}

	/**
	 * @param HtmlImageDefinition $image
	 */
	public function addImage(HtmlImageDefinition $image)
	{
		$this->images[$image->getImageId()] = $image;
	}

	/**
	 * @return array
	 */
	public function getImages()
	{
		return $this->images;
	}
}
