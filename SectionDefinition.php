<?php
namespace DocumentConversionDefinition;

class SectionDefinition
{
	protected $_title;
	protected $_contents;
	
	public function __construct($title, $contents)
	{
		$this->_title = $title;
		$this->_contents = $contents;
	}
}