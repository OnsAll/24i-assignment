<?php

    /**
     * 
     *  @param string $duration
     * @return int
     */
    function convertTimeToSeconds($duration){
        [$hours, $minutes, $seconds] = explode(':', $duration);
        $durationSeconds = $hours * 60 * 60 + $minutes * 60 + $seconds;
        return $durationSeconds;
    }
