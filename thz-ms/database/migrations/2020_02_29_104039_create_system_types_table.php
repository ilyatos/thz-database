<?php

declare(strict_types=1);

use App\Services\Database\Insertable;
use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemTypesTable extends Migration
{
    use Insertable;

    public const TABLE = 'system_types';

    /**
     * CreateSystemTypesTable constructor
     *
     * As far as migrations does not support a DI we have to use app() function to create instances
     */
    public function __construct()
    {
        $this->db = app(DatabaseManager::class);
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

        $this->insert(
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
