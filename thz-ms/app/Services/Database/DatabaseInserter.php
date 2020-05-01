<?php

declare(strict_types=1);

namespace App\Services\Database;

use Carbon\Carbon;
use Illuminate\Database\DatabaseManager;

final class DatabaseInserter
{
    private DatabaseManager $db;

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
     * Add specified timestamp to data and insert it into the table
     *
     * @param string $table
     * @param array  $insertion
     * @param array  $timestamps
     *
     * @return bool
     */
    public function insertWithTimestamps(
        string $table,
        array $insertion,
        array $timestamps = ['created_at', 'updated_at']
    ): bool {
        array_walk($insertion, $this->addTimestampsClosure($timestamps));

        return $this->insert($table, $insertion);
    }

    private function addTimestampsClosure(array $timestamps): callable
    {
        $timestamps = array_fill_keys($timestamps, Carbon::now());

        return static fn (array &$insertion) => $insertion += $timestamps;
    }
}
