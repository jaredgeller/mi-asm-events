<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('last_name', 50)->after('name');
            $table->string('address_street_1', 200)->after('password')->nullable();
            $table->string('address_street_2', 200)->after('address_street_1')->nullable();
            $table->string('address_city', 200)->after('address_street_2')->nullable();
            $table->string('address_state', 20)->after('address_city')->nullable();
            $table->string('address_zip', 10)->after('address_state')->nullable();
            $table->tinyInteger('administrator_ind')->default(0)->after('address');
            $table->date('mi_member_date')->after('administrator_ind')->nullable();

            $table->renameColumn('name', 'first_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
