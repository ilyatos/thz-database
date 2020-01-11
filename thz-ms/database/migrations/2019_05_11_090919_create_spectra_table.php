<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpectraTable extends Migration
{
    /**
     * @return void
     */
    public function up(): void
    {
        Schema::create('spectra', static function (Blueprint $table) {
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
            $table->enum('state', ['solid', 'liquid', 'gas', 'plasma']);
            $table->mediumText('frequency')->nullable();
            $table->mediumText('amplitude')->nullable();
            $table->timestamps();
        });
    }

    /**
     * @return void
     */
    public function down(): void
    {
        Schema::table('spectra', static function (Blueprint $table) {
            $table->dropForeign('spectra_user_id_foreign');
            $table->dropForeign('spectra_category_id_foreign');
            $table->dropIfExists();
        });
    }
}
