<?php

namespace App\Services\Database;

use Illuminate\Database\DatabaseManager;

trait Insertable
{
    private DatabaseManager $db;

    /**
     * Insert data into the table
     *
     * @param string $table
     * @param array  $insertion
     * @param bool   $withTimestamps
     *
     * @return bool
     */
    public function insert(string $table, array $insertion, bool $withTimestamps = true): bool
    {
        if ($withTimestamps) {
            array_walk($insertion, 'array_timestamps');
        }

        return $this->db->table($table)->insert($insertion);
    }
}
