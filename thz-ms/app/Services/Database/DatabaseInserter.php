<?php

namespace App\Services\Database;

use Illuminate\Database\DatabaseManager;

final class DatabaseInserter
{
    private DatabaseManager $db;

    /**
     * DatabaseInserter constructor
     *
     * @param DatabaseManager $db
     */
    public function __construct(DatabaseManager $db)
    {
        $this->db = $db;
    }

    /**
     * Insert data into the table
     *
     * @param string $table
     * @param array  $insertion
     *
     * @return bool
     */
    public function insert(string $table, array $insertion): bool
    {
        return $this->db->table($table)->insert($insertion);
    }

    /**
     * Add timestamp to data and it data into the table
     *
     * @param string $table
     * @param array  $insertion
     *
     * @return bool
     */
    public function insertWithTimestamps(string $table, array $insertion): bool
    {
        array_walk($insertion, 'array_timestamps');

        return $this->insert($table, $insertion);
    }
}
