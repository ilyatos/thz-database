<?php

if (!function_exists('array_timestamps')) {
    /**
     * Add 'created_at' and 'updated_at' timestamp to given array
     *
     * @param array $array
     *
     * @return void
     */
    function array_timestamps(array &$array): void
    {
        $now = now();
        $array += ['created_at' => $now, 'updated_at' => $now];
    }
}
