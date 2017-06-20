<?php
namespace DocumentExportDefinition\Section\Data;

use JMS\Serializer\Annotation as Serializer;
use DocumentExportDefinition\Section\AbstractDataDefinition;

class StringDefinition extends AbstractDataDefinition
{
	public function getType()
	{
		return 'StringDefinition';
	}
}
