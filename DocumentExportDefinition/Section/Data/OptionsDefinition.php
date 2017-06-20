<?php
namespace DocumentExportDefinition\Section\Data;

use DocumentExportDefinition\Section\AbstractDataDefinition;
use JMS\Serializer\Annotation as Serializer;

class OptionsDefinition extends AbstractDataDefinition
{
    /**
     * @Serializer\SerializedName("value")
     * @Serializer\Type("array")
     */
    protected $value;

    public function getType()
    {
        return 'OptionsDefinition';
    }

    /**
     * @return string
     */
    public function getOption($optionName)
    {
        return $this->value[$optionName];
    }

    /**
     * @return string
     */
    public function setOption($optionName, $optionValue)
    {
        $this->value[$optionName] = $optionValue;
    }
    
    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->value;
    }

    /**
     * @return array
     */
    public function setOptions($options)
    {
        $this->value = $options;
    }
}
