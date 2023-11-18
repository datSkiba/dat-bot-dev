<?php
// includes/api.php

function fetchWeeklyRotations() {
    $api_url = 'https://www.bungie.net/Platform/Destiny2/Milestones/';
    $api_key = 'xxxxxxxxx';

    $response = wp_safe_remote_get($api_url, [
        'headers' => [
            'X-API-Key' => $api_key,
        ],
    ]);

    if (is_wp_error($response)) {
        return false;
    }

    $data = wp_remote_retrieve_body($response);
    return json_decode($data, true);
}
