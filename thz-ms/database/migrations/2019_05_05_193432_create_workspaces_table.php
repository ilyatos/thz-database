<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkspacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workspaces', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')
                ->references('id')
                ->on('users');

            $table->string('title');
            $table->timestamps();
        });

        Schema::create('workspace_users', function (Blueprint $table) {
            $table->unsignedBigInteger('workspace_id');
            $table->foreign('workspace_id')
                ->references('id')
                ->on('workspaces');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('workspace_users', function (Blueprint $table) {
            $table->dropForeign('workspace_users_workspace_id_foreign');
            $table->dropForeign('workspace_users_user_id_foreign');
            $table->dropIfExists();
        });

        Schema::table('workspaces', function (Blueprint $table) {
            $table->dropForeign('workspaces_author_id_foreign');
            $table->dropIfExists();
        });
    }
}
