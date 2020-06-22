<?php


class ServiceLivetvProgram
{
    private $id;
    private $extProgramId;
    private $showType;
    private $longTitle;
    private $gridTitle;
    private $originalTitle;
    private $duration;
    private $iso2Lang;
    private $eidrId;
    private $createdAt;
    private $updatedAt;
    private $deletedAt;

    function __construct($extProgramId, $showType, $longTitle, $duration, $iso2Lang){
        $this->setExtProgramId($extProgramId);
        $this->setShowType($showType);
        $this->setLongTitle($longTitle);
        $this->setDuration($duration);
        $this->setIso2Lang($iso2Lang);
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getExtProgramId()
    {
        return $this->extProgramId;
    }

    /**
     * @param mixed $extProgramId
     */
    public function setExtProgramId($extProgramId): void
    {
        $this->extProgramId = $extProgramId;
    }

    /**
     * @return mixed
     */
    public function getShowType()
    {
        return $this->showType;
    }

    /**
     * @param mixed $showType
     */
    public function setShowType($showType): void
    {
        $this->showType = $showType;
    }

    /**
     * @return mixed
     */
    public function getLongTitle()
    {
        return $this->longTitle;
    }

    /**
     * @param mixed $longTitle
     */
    public function setLongTitle($longTitle): void
    {
        $this->longTitle = $longTitle;
    }

    /**
     * @return mixed
     */
    public function getGridTitle()
    {
        return $this->gridTitle;
    }

    /**
     * @param mixed $gridTitle
     */
    public function setGridTitle($gridTitle): void
    {
        $this->gridTitle = $gridTitle;
    }

    /**
     * @return mixed
     */
    public function getOriginalTitle()
    {
        return $this->originalTitle;
    }

    /**
     * @param mixed $originalTitle
     */
    public function setOriginalTitle($originalTitle): void
    {
        $this->originalTitle = $originalTitle;
    }

    /**
     * @return mixed
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param mixed $duration
     */
    public function setDuration($duration): void
    {
        $this->duration = $duration;
    }

    /**
     * @return mixed
     */
    public function getIso2Lang()
    {
        return $this->iso2Lang;
    }

    /**
     * @param mixed $iso2Lang
     */
    public function setIso2Lang($iso2Lang): void
    {
        $this->iso2Lang = $iso2Lang;
    }

    /**
     * @return mixed
     */
    public function getEidrId()
    {
        return $this->eidrId;
    }

    /**
     * @param mixed $eidrId
     */
    public function setEidrId($eidrId): void
    {
        $this->eidrId = $eidrId;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param mixed $updatedAt
     */
    public function setUpdatedAt($updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return mixed
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * @param mixed $deletedAt
     */
    public function setDeletedAt($deletedAt): void
    {
        $this->deletedAt = $deletedAt;
    }
}