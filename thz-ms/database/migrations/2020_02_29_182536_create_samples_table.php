<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSamplesTable extends Migration
{
    public const TABLE = 'samples';

    /**
     * @return void
     */
    public function up(): void
    {
        Schema::create(self::TABLE, static function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('experiment_id');
            $table->foreign('experiment_id')
                ->references('id')
                ->on(CreateExperimentsTable::TABLE)
                ->onDelete('cascade');

            $table->unsignedTinyInteger('matter_state_id');
            $table->foreign('matter_state_id')
                ->references('id')
                ->on(CreateMatterStatesTable::TABLE)
                ->onDelete('restrict');

            $table->string('name');
            $table->text('comment')->nullable();
            $table->smallInteger('height')->comment('In millimeters');
            $table->smallInteger('width')->comment('In millimeters');
            $table->smallInteger('thickness')->comment('In millimeters');
            $table->smallInteger('weight')->comment('In grams');
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
