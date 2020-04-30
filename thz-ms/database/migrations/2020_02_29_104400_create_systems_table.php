<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemsTable extends Migration
{
    public const TABLE = 'systems';

    /**
     * @return void
     */
    public function up(): void
    {
        Schema::create(self::TABLE, static function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on(CreateUsersTable::TABLE)
                ->onDelete('cascade');

            $table->unsignedSmallInteger('type_id');
            $table->foreign('type_id')
                ->references('id')
                ->on(CreateSystemTypesTable::TABLE)
                ->onDelete('restrict');

            $table->string('name');
            $table->text('description')->nullable();
            $table->string('manufacturer');
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
