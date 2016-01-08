<?php
namespace DocumentExportDefinition\Section\Encoded;

use JMS\Serializer\Annotation as Serializer;

class ImageDefinition extends AbstractEncodedDataDefinition
{
	public function getType()
	{
		return 'ImageDefinition';
	}
}
