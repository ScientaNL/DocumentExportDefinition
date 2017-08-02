<?php

namespace DocumentExportDefinition\Section\Data;

use DocumentExportDefinition\Section\AbstractDataDefinition;
use JMS\Serializer\Annotation as Serializer;

class ListDefinition extends AbstractDataDefinition
{
    /**
    * @Serializer\SerializedName("value")
    * @Serializer\Type("string")
    * @Serializer\Accessor(getter="getCustomListDocx",setter="setCustomListDocx")
    */
    protected $customListDocx;

    /**
     * @Serializer\VirtualProperty
     * @Serializer\SerializedName("objectType")
     * @Serializer\Type("string")
     * @return string
     */
    public function getType()
    {
        return 'ListDefinition';
    }

    /**
     * @return mixed
     */
    public function getCustomListDocx()
    {
        return $this->customListDocx;
    }

    /**
     * @param mixed $customListDocx
     */
    public function setCustomListDocx($customListDocx)
    {
        $this->customListDocx = $customListDocx;
    }

}
