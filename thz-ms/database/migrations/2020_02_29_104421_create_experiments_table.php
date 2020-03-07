<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperimentsTable extends Migration
{
    public const TABLE = 'experiments';

    /**
     * @return void
     */
    public function up(): void
    {
        Schema::create(self::TABLE, static function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('research_id')->nullable();
            $table->foreign('research_id')
                ->references('id')
                ->on('researches')
                ->onDelete('set null');

            $table->unsignedBigInteger('populator_id');
            $table->foreign('populator_id')
                ->references('id')
                ->on('users')
                ->onDelete('restrict');

            $table->unsignedBigInteger('system_id');
            $table->foreign('system_id')
                ->references('id')
                ->on('systems')
                ->onDelete('restrict');

            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(self::TABLE);
    }
}
