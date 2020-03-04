<?php

declare(strict_types=1);

use App\Services\Database\Insertable;
use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatterStatesTable extends Migration
{
    use Insertable;

    public const TABLE = 'matter_states';

    /**
     * CreateMatterStatesTable constructor
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
