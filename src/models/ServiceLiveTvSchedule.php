<?php


class ServiceLiveTvSchedule
{
    private $id;
    private $extScheduleId;
    private $channelId;
    private $startTime;
    private $endTime;
    private $runTime;
    private $programId;
    private $isLive;
    private $createdAt;
    private $updatedAt;
    private $deletedAt;

    function __construct($extScheduleId, $channelId, $startTime, $endTime, $runTime, $programId)
    {
        $this->setExtScheduleId($extScheduleId);
        $this->setChannelId($channelId);
        $this->setStartTime($startTime);
        $this->setEndTime($endTime);
        $this->setRunTime($runTime);
        $this->setProgramId($programId);
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
    public function getExtScheduleId()
    {
        return $this->extScheduleId;
    }

    /**
     * @param mixed $extScheduleId
     */
    public function setExtScheduleId($extScheduleId): void
    {
        $this->extScheduleId = $extScheduleId;
    }

    /**
     * @return mixed
     */
    public function getChannelId()
    {
        return $this->channelId;
    }

    /**
     * @param mixed $channelId
     */
    public function setChannelId($channelId): void
    {
        $this->channelId = $channelId;
    }

    /**
     * @return mixed
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * @param mixed $startTime
     */
    public function setStartTime($startTime): void
    {
        $this->startTime = $startTime;
    }

    /**
     * @return mixed
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * @param mixed $endTime
     */
    public function setEndTime($endTime): void
    {
        $this->endTime = $endTime;
    }

    /**
     * @return mixed
     */
    public function getRunTime()
    {
        return $this->runTime;
    }

    /**
     * @param mixed $runTime
     */
    public function setRunTime($runTime): void
    {
        $this->runTime = $runTime;
    }

    /**
     * @return mixed
     */
    public function getProgramId()
    {
        return $this->programId;
    }

    /**
     * @param mixed $programId
     */
    public function setProgramId($programId): void
    {
        $this->programId = $programId;
    }

    /**
     * @return mixed
     */
    public function getIsLive()
    {
        return $this->isLive;
    }

    /**
     * @param mixed $isLive
     */
    public function setIsLive($isLive): void
    {
        $this->isLive = $isLive;
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