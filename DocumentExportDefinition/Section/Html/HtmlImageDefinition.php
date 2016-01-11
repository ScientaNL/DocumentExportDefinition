<?php
namespace DocumentExportDefinition\Section\Html;

use DocumentExportDefinition\Section\Encoded\ImageDefinition;
use JMS\Serializer\Annotation as Serializer;

class HtmlImageDefinition extends ImageDefinition
{
	const IMG_PROTOCOL_NAME = "dedimg";

	public function getType()
	{
		return 'HtmlImageDefinition';
	}
}
