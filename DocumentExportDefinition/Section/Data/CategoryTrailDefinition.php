<?php
namespace DocumentExportDefinition\Section\Data;

use DocumentExportDefinition\Section\AbstractDataDefinition;
use JMS\Serializer\Annotation as Serializer;

class CategoryTrailDefinition extends AbstractDataDefinition
{
	/**
	 * @Serializer\SerializedName("value")
	 * @Serializer\Type("array")
	 * @var array
	 */
	protected $value;

    /**
     * @Serializer\VirtualProperty
     * @Serializer\SerializedName("objectType")
     * @Serializer\Type("string")
     * @return string
     */
    public function getType()
	{
		return 'CategoryTrailDefinition';
	}

	/**
	 * @param string $value
	 */
	public function setValue($value)
	{
		$this->value = $value;
	}

	/**
	 * @return array
	 */
	public function getValue() : array
	{
		return $this->value;
	}
}
