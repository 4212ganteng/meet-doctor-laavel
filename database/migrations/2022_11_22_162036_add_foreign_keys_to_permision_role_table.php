<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPermisionRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permision_role', function (Blueprint $table) {
            //
            $table->foreign('permision_id', 'fk_permision_role_to_permision')->references('id')->on('permision')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('role_id', 'fk_permision_role_to_role')->references('id')->on('role')->onDelete('CASCADE')->onUpdate('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permision_role', function (Blueprint $table) {
            //
            $table->dropForeign('fk_permision_role_to_permision');
            $table->dropForeign('fk_permision_role_to_role');

        });
    }
}
