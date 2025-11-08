<?php

namespace HKU\Theme;

abstract class WpRemote
{
    protected static string $transientKey = "hku_remote_temp_data";
    protected static int $expirationInHours = 24;
    protected static string $optionKey = "hku_remote_data";
    protected string $url;

    protected readonly array $data;

    public function get_remote_data() {

        $transient_key = static::$transientKey . md5($this->url);
        $option_key = static::$optionKey . md5($this->url);

        $cached_data = get_transient($transient_key);

        if (false !== $cached_data) {
            return $cached_data;
        }

        $response = wp_remote_get($this->url, array(
            'timeout' => 15,
            'headers' => array(
                'Accept' => 'application/json'
            )
        ));

        if (is_wp_error($response)) {
            // Return last known good data from options if available
            $backup_data = get_option($option_key, false);
            if ($backup_data) {
                return $backup_data;
            }
            return false;
        }

        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);

        if (null === $data) {
            // Return last known good data from options if available
            $backup_data = get_option($option_key, false);
            if ($backup_data) {
                return $backup_data;
            }
            return false;
        }

        // Set transient for x amount of time, measured in seconds
        set_transient($transient_key, $data, static::$expirationInHours * HOUR_IN_SECONDS);

        // Store a persistent backup in options (with autoload disabled)
        if (false === get_option($option_key, false)) {
            add_option($option_key, $data, '', false);
        } else {
            update_option($option_key, $data, false);
        }

        return $this->data = $data;
    }
}