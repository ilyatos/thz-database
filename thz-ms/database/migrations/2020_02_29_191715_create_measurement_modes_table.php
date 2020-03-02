<?php

declare(strict_types=1);

use App\Services\Database\Insertable;
use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeasurementModesTable extends Migration
{
    use Insertable;

    public const TABLE = 'measurement_modes';

    /**
     * CreateMeasurementModesTable constructor
     */
    public function __construct()
    {
        $this->db = app(DatabaseManager::class);
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

        $this->insert(
            self::TABLE,
            [
                ['name' => 'reflection'],
                ['name' => 'absorption'],
                ['name' => 'ATR'],
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
