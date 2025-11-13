<?php
add_action( 'hku_cron_hook', 'hku_cron_exec' );

if ( ! wp_next_scheduled( 'hku_cron_hook' ) ) {
    $schedule = wp_schedule_event( (new \DateTime('midnight'))->getTimestamp(), 'daily', 'hku_cron_hook' );
}

function hku_cron_exec()
{
    $getAcademicPersonal = new \HKU\Theme\GetAcademicPersonal();
    $getRemoteNumbers = new \HKU\Theme\GetRemoteNumbers();

    $syncPersonal = $getAcademicPersonal->get_remote_data();
    $syncNumbers = $getRemoteNumbers->get_remote_data();
}