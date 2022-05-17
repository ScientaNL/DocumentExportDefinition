<?php

namespace DocumentExportDefinition\Section\Html;

use DocumentExportDefinition\Section\Encoded\ImageDefinition;
use JMS\Serializer\Annotation as Serializer;

class HtmlImageDefinition extends ImageDefinition
{
	public const IMG_PROTOCOL_NAME = "dedimg";

	/**
	 * @Serializer\VirtualProperty
	 * @Serializer\SerializedName("objectType")
	 * @Serializer\Type("string")
	 * @return string
	 */
	public function getType(): string
	{
		return 'HtmlImageDefinition';
	}
}
