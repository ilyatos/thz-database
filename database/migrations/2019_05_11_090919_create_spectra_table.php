<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpectraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spectra', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
                ->references('id')
                ->on('categories');

            $table->string('title');
            $table->string('system');
            $table->enum('mode', ['transmission', 'reflection']);
            $table->smallInteger('temp');
            $table->string('state');
            $table->text('frequency');
            $table->text('amplitude');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('spectra', function (Blueprint $table) {
            $table->dropForeign('spectra_user_id_foreign');
            $table->dropForeign('spectra_category_id_foreign');
            $table->dropIfExists();
        });
    }
}
