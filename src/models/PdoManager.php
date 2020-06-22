<?php

include "ServiceLivetvProgram.php";
include "ServiceLiveTvSchedule.php";

class PdoManager
{
    public $pdo;

    function __construct()
    {
        $this->pdo = new PDO('mysql:host=ws-database;dbname=ws-import', 'root', 'hunter2');
    }

    /**
     * get all channels
     */
    public function getAllChannels(){
        $sql = 'SELECT * FROM service_livetv_channel';
        $channels = $this->pdo->query(sprintf($sql))->fetchAll();
        return $channels;
    }

    /**
     * save program
     *  @param ServiceLivetvProgram $program
     * @return boolean
     */
    public function saveProgram(ServiceLivetvProgram $program){
        $sql = sprintf(
            'INSERT INTO service_livetv_program (ext_program_id, show_type, long_title, duration, iso_2_lang) VALUES ("%s", "%s", "%s", %s, "%s")',
            $program->getExtProgramId(),
            $program->getShowType(),
            $program->getLongTitle(),
            $program->getDuration(),
            $program->getIso2Lang()
        );

        if(!$this->pdo->query($sql)){
            print_r($this->pdo->errorInfo());
            return false;
        }
        $program->setId($this->getLastInsertId());
        return true;
    }

    public function getLastInsertId(){
        return $this->pdo->lastInsertId();
    }

    /**
     * save schedule
     *  @param ServiceLiveTvSchedule $schedule
     * @return boolean
     */
    public function saveSchedule(ServiceLiveTvSchedule $schedule){
        $sql = sprintf(
            'INSERT INTO service_livetv_schedule (ext_schedule_id, channel_id, start_time, end_time, run_time, program_id) VALUES ("%s", %d, %d, %d, %d, %s)',
            $schedule->getExtScheduleId(),
            $schedule->getChannelId(),
            $schedule->getStartTime(),
            $schedule->getEndTime(),
            $schedule->getRunTime(),
            $schedule->getProgramId()
        );

        if(!$this->pdo->query(sprintf($sql))){
            print_r($this->pdo->errorInfo());
            return false;
        }
        return true;
    }

}