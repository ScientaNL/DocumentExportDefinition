<?php
namespace DocumentExportDefinition;

use JMS\Serializer\Annotation as Serializer;

class DocumentDefinition
{
	/**
	 * @Serializer\SerializedName("sections")
	 * @Serializer\Type("array<DocumentExportDefinition\SectionDefinition>")
	 * @var array
	 */
	protected $_sections = array();
	
	public function addSection(SectionDefinition $section)
	{
		$this->_sections[] = $section;
	}
	
	/**
	 * @return SectionDefinition[]
	 */
	public function getSections()
	{
		return $this->_sections;
	}	
}