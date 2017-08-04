<?php
namespace DocumentExportDefinition\Section\Data;

use DocumentExportDefinition\Section\AbstractDataDefinition;
use JMS\Serializer\Annotation as Serializer;

class FileDefinition extends AbstractDataDefinition
{
    /**
     * @Serializer\SerializedName("fileSize")
     * @Serializer\Type("string")
     */
    protected $fileSize;

    /**
     * @Serializer\SerializedName("fileType")
     * @Serializer\Type("string")
     */
    protected $fileType;

    /**
     * @Serializer\SerializedName("description")
     * @Serializer\Type("string")
     */
    protected $description;

    /**
     * @Serializer\VirtualProperty
     * @Serializer\SerializedName("objectType")
     * @Serializer\Type("string")
     * @return string
     */
    public function getType()
	{
		return 'FileDefinition';
	}

    /**
     * @return mixed
     */
    public function getFilesize()
    {
        return $this->fileSize;
    }

    /**
     * @return mixed
     */
    public function getFileType()
    {
        return $this->fileType;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }
}
