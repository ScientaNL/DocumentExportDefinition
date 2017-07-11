<?php
namespace DocumentExportDefinition;

use DocumentExportDefinition\Section\SectionDefinition;
use JMS\Serializer\Annotation as Serializer;
use DocumentExportDefinition\Exception\InvalidArgumentException;

class DocumentDefinition
{
    const PROPERTY_TITLE = "title";
    const PROPERTY_CREATOR = "creator";
    const PROPERTY_COMPANY = "company";
    const PROPERTY_LOCALE = "locale";
    const PROPERTY_DATE = 'date';

    const OPTION_MERGE = 'mergeDocuments';

    /**
     * @Serializer\SerializedName("header")
     * @Serializer\Type("DocumentExportDefinition\Section\SectionDefinition")
     * @var SectionDefinition
     */
    protected $header;

    /**
     * @Serializer\SerializedName("footer")
     * @Serializer\Type("DocumentExportDefinition\Section\SectionDefinition")
     * @var SectionDefinition
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
     */
    protected $templateDocx;

    /**
     * @Serializer\SerializedName("options")
     * @Serializer\Type("array")
     * @var array
     */
    protected $options = [
        self::OPTION_MERGE => null,
    ];

    /**
     * @Serializer\SerializedName("documentProperties")
     * @Serializer\Type("array")
     * @var array
     */
    protected $documentProperties = [
        self::PROPERTY_TITLE => null,
        self::PROPERTY_CREATOR => null,
        self::PROPERTY_COMPANY => null,
        self::PROPERTY_LOCALE => null,
        self::PROPERTY_DATE => null
    ];

    /**
     * @return SectionDefinition
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @return SectionDefinition
     */
    public function getFooter()
    {
        return $this->footer;
    }

    /**
     * @param SectionDefinition $section
     */
    public function prependSection(SectionDefinition $section)
    {
        array_unshift($this->sections, $section);
    }

    /**
     * @param SectionDefinition $section
     */
    public function addSection(SectionDefinition $section)
    {
        $this->sections[] = $section;
    }

    /**
     * @param $sectionType
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

    public function setOption($option, $value)
    {
        if (array_key_exists($option, $this->options) === false) {
            throw new InvalidArgumentException(sprintf("Invalid option %s specified", $option));
        }

        $this->options[$option] = $value;
    }

    public function getOption($option)
    {
        if (array_key_exists($option, $this->options) === false) {
            throw new InvalidArgumentException(sprintf("Invalid option %s specified", $option));
        }

        return $this->options[$option];
    }

    public function setDocumentProperty($property, $value)
    {
        if (array_key_exists($property, $this->documentProperties) === false) {
            throw new InvalidArgumentException(sprintf("Invalid property %s specified", $property));
        }

        $this->documentProperties[$property] = $value;
    }

    public function getDocumentProperty($property)
    {
        if (array_key_exists($property, $this->documentProperties) === false) {
            throw new InvalidArgumentException(sprintf("Invalid option %s specified", $property));
        }

        return $this->documentProperties[$property];
    }

    public function setTemplateDocx($templateFile)
    {
        $this->templateDocx = $templateFile;
    }

    public function getTemplateDocx()
    {
        return $this->templateDocx;
    }

    /**
     * @param $templateFile
     */
    public function setEncodedTemplate($templateFile)
    {
        $this->templateDocx = base64_decode($templateFile);
    }

    /**
     * @return string
     */
    public function getEncodedTemplate()
    {
        return base64_encode($this->templateDocx);
    }

}
