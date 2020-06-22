<?php

include 'utils.php';
include 'models/PdoManager.php';

$xml = simplexml_load_string(file_get_contents('/code/kuivuri.xml'));

$pdo = new PdoManager();

$writtenSchedules = 0;
$channels = $pdo->getAllChannels();

// since we can only import schedules from existing channels then we start the loop
// from all the channels and search for it's events directly in the xml.
foreach ($channels as $channel) {

    $serviceId = $channel['source_id'];

    // search events from xml using Xpath so that we don't have to loop deep down to it.
    // in this case the relative path is faster then absolute path.
    $events = $xml->xpath("//./service[@id=$serviceId]/event");
    foreach ($events as $event) {
        $eventId = $event['id'];
        $eventStart = $event['start_time'];
        $eventDuration = $event['duration'];
        $program = $event->language[0]->short_event;
        $programLanguage = $program['language'];
        $programTitle = $program['name'];
        $programDescription = $program['text'];

        $durationSeconds = convertTimeToSeconds($eventDuration);
        $startTimestamp = DateTime::createFromFormat('y/m/d H:i:s', $eventStart)->getTimestamp();

        $serviceLivetvProgram = new ServiceLivetvProgram($eventId, 'other', $programTitle, $durationSeconds, $programLanguage);
        if(!$pdo->saveProgram($serviceLivetvProgram)){
            continue;
        }

        $schedule = new ServiceLiveTvSchedule($eventId, $channel['id'], $startTimestamp, $startTimestamp + $durationSeconds, $durationSeconds, $serviceLivetvProgram->getId());
        if(!empty($pdo->saveSchedule($schedule))){
            echo sprintf("Written schedules: %d" . PHP_EOL, $writtenSchedules++);
        }
    }

}