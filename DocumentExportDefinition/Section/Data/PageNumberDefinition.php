<?php
namespace DocumentExportDefinition\Section\Data;

use DocumentExportDefinition\Section\AbstractDataDefinition;
use JMS\Serializer\Annotation as Serializer;

class PageNumberDefinition extends AbstractDataDefinition
{
    public function getType()
    {
        return 'PageNumberDefinition';
    }
}
