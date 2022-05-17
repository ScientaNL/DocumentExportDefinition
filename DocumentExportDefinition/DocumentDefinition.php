<?php

namespace DocumentExportDefinition;

use DocumentExportDefinition\Section\SectionDefinition;
use JMS\Serializer\Annotation as Serializer;
use DocumentExportDefinition\Exception\InvalidArgumentException;

class DocumentDefinition
{
	public const PROPERTY_TITLE = "title";
	public const PROPERTY_CREATOR = "creator";
	public const PROPERTY_KEYWORDS = "keywords";
	public const PROPERTY_DESCRIPTION = "description";
	public const PROPERTY_CATEGORY = "category";
	public const PROPERTY_CONTENT_STATUS = "contentStatus";
	public const PROPERTY_COMPANY = "company";
	public const PROPERTY_DATE = 'date';
	public const PROPERTY_LOCALE = "locale";

	public const PROPERTY_LOCALIZED_SIZE = 'localizedSize';
	public const PROPERTY_LOCALIZED_DESCRIPTION = 'localizedDescription';
	public const PROPERTY_LOCALIZED_TYPE = 'localizedType';

	public const PROPERTY_LOCALIZED_RASCI_RESPONSIBLE = 'responsible';
	public const PROPERTY_LOCALIZED_RASCI_ACCOUNTABLE = 'accountable';
	public const PROPERTY_LOCALIZED_RASCI_SUPPORT = 'support';
	public const PROPERTY_LOCALIZED_RASCI_CONSULT = 'consult';
	public const PROPERTY_LOCALIZED_RASCI_INFORM = 'inform';

	public const OPTION_BASE_URL = 'baseUrl';
	public const OPTION_CONVERSION_TYPE = 'conversionType';
	public const OPTION_CATEGORIES_AS_FOLDERS = "categoriesAsFolders";
	public const OPTION_MERGE_CONTINUOUS = 'mergeContinuous';
	public const OPTION_TEMPLATE_VAR_SYMBOL = 'templateVarSymbol';

	public const LANDSCAPE = 'landscape';
	public const PORTRAIT = 'portrait';

	/**
	 * @Serializer\SerializedName("header")
	 * @Serializer\Type("DocumentExportDefinition\Section\SectionDefinition")
	 * @var SectionDefinition|null
	 */
	protected $header;

	/**
	 * @Serializer\SerializedName("footer")
	 * @Serializer\Type("DocumentExportDefinition\Section\SectionDefinition")
	 * @var SectionDefinition|null
	 */
	protected $footer;

	/**
	 * @Serializer\SerializedName("sections")
	 * @Serializer\Type("array<DocumentExportDefinition\Section\SectionDefinition>")
	 * @var SectionDefinition[]
	 */
	protected $sections = [];

	/**
	 * @Serializer\Type("string")
	 * @Serializer\SerializedName("templateDocx")
	 * @Serializer\Accessor(getter="getEncodedTemplate",setter="setEncodedTemplate")
	 * @var string|null
	 */
	protected $templateDocx;

	/**
	 * @Serializer\SerializedName("options")
	 * @Serializer\Type("array")
	 * @var array
	 */
	protected $options = [
		self::OPTION_BASE_URL => null,
		self::OPTION_CONVERSION_TYPE => null,
		self::OPTION_CATEGORIES_AS_FOLDERS => null,
		self::OPTION_MERGE_CONTINUOUS => null,
		self::OPTION_TEMPLATE_VAR_SYMBOL => '[$]'
	];

	/**
	 * @Serializer\SerializedName("documentProperties")
	 * @Serializer\Type("array")
	 * @var array
	 */
	protected $documentProperties = [
		self::PROPERTY_TITLE => null,
		self::PROPERTY_CREATOR => null,
		self::PROPERTY_KEYWORDS => null,
		self::PROPERTY_DESCRIPTION => null,
		self::PROPERTY_CATEGORY => null,
		self::PROPERTY_CONTENT_STATUS => null,
		self::PROPERTY_COMPANY => null,
		self::PROPERTY_DATE => null,
		self::PROPERTY_LOCALE => null,
		self::PROPERTY_LOCALIZED_SIZE => null,
		self::PROPERTY_LOCALIZED_DESCRIPTION => null,
		self::PROPERTY_LOCALIZED_TYPE => null,
		self::PROPERTY_LOCALIZED_RASCI_RESPONSIBLE => null,
		self::PROPERTY_LOCALIZED_RASCI_ACCOUNTABLE => null,
		self::PROPERTY_LOCALIZED_RASCI_SUPPORT => null,
		self::PROPERTY_LOCALIZED_RASCI_CONSULT => null,
		self::PROPERTY_LOCALIZED_RASCI_INFORM => null
	];

	/**
	 * @param SectionDefinition $section
	 * @return $this
	 */
	public function setHeader(SectionDefinition $section): self
	{
		$this->header = $section;
		return $this;
	}

	/**
	 * @return SectionDefinition|null
	 */
	public function getHeader()
	{
		return $this->header;
	}

	/**
	 * @param SectionDefinition $section
	 * @return $this
	 */
	public function setFooter(SectionDefinition $section): self
	{
		$this->footer = $section;
		return $this;
	}

	/**
	 * @return SectionDefinition|null
	 */
	public function getFooter()
	{
		return $this->footer;
	}

	/**
	 * @param SectionDefinition $section
	 * @return $this
	 */
	public function prependSection(SectionDefinition $section)
	{
		array_unshift($this->sections, $section);
		return $this;
	}

	/**
	 * @param SectionDefinition $section
	 * @return $this
	 */
	public function addSection(SectionDefinition $section)
	{
		$this->sections[] = $section;
		return $this;
	}

	/**
	 * @param class-string $sectionType
	 * @return bool
	 */
	public function hasSection($sectionType)
	{
		foreach ($this->sections as $section) {
			if ($section instanceof $sectionType) {
				return true;
			}
		}

		return false;
	}

	/**
	 * @return SectionDefinition[]
	 */
	public function getSections()
	{
		return $this->sections;
	}

	/**
	 * @param string $option
	 * @param mixed $value
	 * @return $this
	 */
	public function setOption(string $option, $value): self
	{
		if (array_key_exists($option, $this->options) === false) {
			throw new InvalidArgumentException(sprintf("Invalid option %s specified", $option));
		}

		$this->options[$option] = $value;
		return $this;
	}

	/**
	 * @param string $option
	 * @return mixed
	 */
	public function getOption(string $option)
	{
		if (array_key_exists($option, $this->options) === false) {
			throw new InvalidArgumentException(sprintf("Invalid option %s specified", $option));
		}

		return $this->options[$option];
	}

	/**
	 * @param string $property
	 * @param mixed $value
	 * @return $this
	 */
	public function setDocumentProperty(string $property, $value): self
	{
		if (array_key_exists($property, $this->documentProperties) === false) {
			throw new InvalidArgumentException(sprintf("Invalid property %s specified", $property));
		}

		$this->documentProperties[$property] = $value;
		return $this;
	}

	/**
	 * @param string $property
	 * @return mixed
	 */
	public function getDocumentProperty(string $property)
	{
		if (array_key_exists($property, $this->documentProperties) === false) {
			throw new InvalidArgumentException(sprintf("Invalid property %s specified", $property));
		}

		return $this->documentProperties[$property];
	}

	/**
	 * @param string $templateFile
	 * @return $this
	 */
	public function setTemplateDocx(string $templateFile): self
	{
		$this->templateDocx = $templateFile;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getTemplateDocx()
	{
		return $this->templateDocx;
	}

	/**
	 * @param string $templateFile
	 * @return $this
	 */
	public function setEncodedTemplate(string $templateFile): self
	{
		$this->templateDocx = base64_decode($templateFile);
		return $this;
	}

	/**
	 * @return string
	 */
	public function getEncodedTemplate()
	{
		return base64_encode((string)$this->templateDocx);
	}
}
