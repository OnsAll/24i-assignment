<?php
$xml = simplexml_load_string(file_get_contents('/code/kuivuri.xml'));

$pdo = new PDO('mysql:host=ws-database;dbname=ws-import', 'root', 'hunter2');

$writtenSchedules = 0;
foreach ($xml->network as $network) {
    $networkName = $network['name'];
    foreach ($network->service as $service) {
        $serviceId = $service['id'];

        // Fetch the channel from the DB
        $channel = $pdo->query(sprintf('SELECT * FROM service_livetv_channel WHERE source_id = "%s"', $serviceId))
            ->fetch();

        if (empty($channel)) {
            continue; // If channel doesn't exist in DB, ignore the data
        }

        foreach ($service->event as $event) {
            $eventId = $event['id'];
            $eventStart = $event['start_time'];
            $eventDuration = $event['duration'];
            $program = $event->language[0]->short_event;
            $programLanguage = $program['language'];
            $programTitle = $program['name'];
            $programDescription = $program['text'];

            [$hours, $minutes, $seconds] = explode(':', $eventDuration);
            $durationSeconds = $hours * 60 * 60 + $minutes * 60 + $seconds;
            $startTimestamp = DateTime::createFromFormat('y/m/d H:i:s', $eventStart)->getTimestamp();

            // Write program
            $sql = sprintf(
                'INSERT INTO service_livetv_program (ext_program_id, show_type, long_title, duration, iso_2_lang) VALUES ("%s", "%s", "%s", %s, "%s")',
                $eventId,
                'other',
                $programTitle,
                $durationSeconds,
                $programLanguage
            );
            if(!$pdo->query($sql)) {
                 print_r($pdo->errorInfo());
            }

            // Fetch inserted program
            $dbProgram = $pdo->query(sprintf('SELECT * FROM service_livetv_program WHERE ext_program_id = "%s"', $eventId))
                ->fetch();

            // Write schedule event
            $sql = sprintf(
                'INSERT INTO service_livetv_schedule (ext_schedule_id, channel_id, start_time, end_time, run_time, program_id) VALUES ("%s", %d, %d, %d, %d, %s)',
                $eventId,
                $channel['id'],
                $startTimestamp,
                $startTimestamp + $durationSeconds,
                $durationSeconds,
                $dbProgram['id']
            );
            if (!$pdo->query($sql)) {
                print_r($pdo->errorInfo());
            } else {
                echo sprintf("Written schedules: %d" . PHP_EOL, $writtenSchedules++);
            }

        }
    }
}


