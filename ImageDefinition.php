<?php
namespace DocumentConversionDefinition;

class ImageDefinition
{
	protected $_contents;

	public function __construct($contents)
	{
		$this->_contents = $contents;
	}
}