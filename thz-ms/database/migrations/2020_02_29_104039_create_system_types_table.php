<?php

declare(strict_types=1);

use App\Services\Database\DatabaseInserter;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemTypesTable extends Migration
{
    public const TABLE = 'system_types';

    private DatabaseInserter $inserter;

    /**
     * CreateSystemTypesTable constructor
     *
     * We have to use app() function to create instances as far as migrations does not support a DI
     */
    public function __construct()
    {
        $this->inserter = app(DatabaseInserter::class);
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(self::TABLE, static function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name')->unique();
            $table->timestamps();
        });

        $this->inserter->insertWithTimestamps(
            self::TABLE,
            [
                ['name' => 'TDS'],
                ['name' => 'FTIR'],
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(self::TABLE);
    }
}
