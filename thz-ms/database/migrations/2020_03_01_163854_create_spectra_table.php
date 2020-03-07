<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpectraTable extends Migration
{
    public const TABLE = 'spectra';

    /**
     * @return void
     */
    public function up(): void
    {
        Schema::create(self::TABLE, static function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('sample_id');
            $table->foreign('sample_id')
                ->references('id')
                ->on(CreateSamplesTable::TABLE)
                ->onDelete('cascade');

            $table->unsignedTinyInteger('measurement_mode_id');
            $table->foreign('measurement_mode_id')
                ->references('id')
                ->on(CreateMeasurementModesTable::TABLE)
                ->onDelete('restrict');

            $table->unsignedTinyInteger('axis_name_id');
            $table->foreign('axis_name_id')
                ->references('id')
                ->on(CreateAxisNamesTable::TABLE)
                ->onDelete('restrict');

            $table->json('data')->nullable();
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
