<?php

namespace HKU\Theme;

class GetRemoteNumbers extends WpRemote
{
    protected static string $transientKey = 'hku_remote_numbers_temp';
    protected static string $optionKey = 'hku_remote_numbers';

    protected string $url = "https://api.hku.io/v1/";

    public function get_remote_data() {
        // MOCKUP
        return [
            'students' => 8134,
            'teachers' => 155,
            'professors' => 36,
            'faculty' => 7,
            'research' => 81,
            ];
    }
}