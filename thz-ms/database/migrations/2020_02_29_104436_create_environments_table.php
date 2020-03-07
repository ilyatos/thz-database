<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnvironmentsTable extends Migration
{
    public const TABLE = 'environments';

    /**
     * @return void
     */
    public function up(): void
    {
        Schema::create(self::TABLE, static function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('experiment_id')->unique();
            $table->foreign('experiment_id')
                ->references('id')
                ->on(CreateExperimentsTable::TABLE)
                ->onDelete('cascade');

            $table->unsignedSmallInteger('temperature')->comment('Kelvin temperature');
            $table->unsignedTinyInteger('humidity')->nullable()->comment('Humidity as a percentage');
            $table->unsignedSmallInteger('pressure')->nullable()->comment('Atmospheric pressure as a mmHg');
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
