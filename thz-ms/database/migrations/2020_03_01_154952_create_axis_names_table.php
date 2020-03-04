<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAxisNamesTable extends Migration
{
    /**
     * @return void
     */
    public function up(): void
    {
        Schema::create('axis_names', static function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('y_axis');
            $table->string('x_axis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('axis_names');
    }
}
