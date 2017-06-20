<?php
namespace DocumentExportDefinition\Section\Data;

use DocumentExportDefinition\Section\AbstractDataDefinition;
use JMS\Serializer\Annotation as Serializer;

class StringDefinition extends AbstractDataDefinition
{
    /**
     * @Serializer\VirtualProperty
     */
    public function getType()
	{
		return 'StringDefinition';
	}
}
