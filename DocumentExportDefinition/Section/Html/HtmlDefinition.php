<?php

namespace DocumentExportDefinition\Section\Html;

use DocumentExportDefinition\Section\AbstractDataDefinition;
use JMS\Serializer\Annotation as Serializer;

class HtmlDefinition extends AbstractDataDefinition
{
	/**
	 * @Serializer\SerializedName("images")
	 * @Serializer\Type("array<string,DocumentExportDefinition\Section\Html\HtmlImageDefinition>")
	 * @var array
	 */
	protected array $images = [];

	/**
	 * @Serializer\SerializedName("useStrictStyles")
	 * @Serializer\Type("boolean")
	 */
	protected bool $useStrictStyles = true;

	/**
	 * @Serializer\VirtualProperty
	 * @Serializer\SerializedName("objectType")
	 * @Serializer\Type("string")
	 * @return string
	 */
	public function getType(): string
	{
		return 'HtmlDefinition';
	}

	/**
	 * @param HtmlImageDefinition $image
	 * @return $this
	 */
	public function addImage(HtmlImageDefinition $image): self
	{
		$this->images[$image->getFileId()] = $image;
		return $this;
	}

	/**
	 * @return array
	 */
	public function getImages(): array
	{
		return $this->images;
	}

	/**
	 * @param bool $useStrictStyles
	 * @return $this
	 */
	public function setUseStrictStyles(bool $useStrictStyles): self
	{
		$this->useStrictStyles = $useStrictStyles;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function getUseStrictStyles(): bool
	{
		return $this->useStrictStyles;
	}
}
