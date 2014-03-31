<?php
namespace DocumentConversionDefinition;

class DocumentDefinition
{
	protected $_sections = array();
	
	public function __construct()
	{
		//
	}
	
	public function addSection(SectionDefinition $section)
	{
		$this->_sections[] = $section;
	}
}