<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsFirstnameAndLastnameAndPhoneAndBirthdateAndFunctionAndRoleIdToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('lastname')->after('id');
            $table->string('firstname')->after('id');
            $table->bigInteger('role_id')->default(1)->after('id');
            $table->string('phone')->after('password');
            $table->string('function')->after('password')->nullable();
            $table->string('department')->after('password')->nullable();
            $table->string('email_code')->after('password')->nullable();
            $table->string('phone_code')->after('password')->nullable();
            $table->bigInteger('entity_id')->unsigned()->after('id');
            $table->foreign('entity_id')->references('id')->on('entities');
            $table->string('avatar')->after('id');
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
            $table->dropColumn('avatar', 'lastname', 'firstname', 'role_id', 'phone', 'function', 'department', 'email_code', 'phone_code', 'entity_id');
        });
    }
}
