<?php

declare(strict_types=1);

use App\Services\Database\DatabaseInserter;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatterStatesTable extends Migration
{
    public const TABLE = 'matter_states';

    private DatabaseInserter $inserter;

    /**
     * CreateMatterStatesTable constructor
     */
    public function __construct()
    {
        $this->inserter = app(DatabaseInserter::class);
    }

    /**
     * @return void
     */
    public function up(): void
    {
        Schema::create(self::TABLE, static function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('name')->unique();
            $table->timestamps();
        });

        $this->inserter->insertWithTimestamps(
            self::TABLE,
            [
                ['name' => 'solid'],
                ['name' => 'liquid'],
                ['name' => 'gas'],
                ['name' => 'plasma'],
            ]
        );
    }

    /**
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(self::TABLE);
    }
}
