<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSampleSpectraTable extends Migration
{
    public const TABLE = 'sample_spectra';

    /**
     * @return void
     */
    public function up(): void
    {
        Schema::create(self::TABLE, static function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedTinyInteger('measurement_mode_id');
            $table->foreign('measurement_mode_id')
                ->references('id')
                ->on('measurement_modes')
                ->onDelete('restrict');

            $table->unsignedTinyInteger('axis_name_id');
            $table->foreign('axis_name_id')
                ->references('id')
                ->on('axis_names')
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
