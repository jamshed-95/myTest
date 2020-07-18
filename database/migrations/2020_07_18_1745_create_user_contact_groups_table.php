<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserContactGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_contact_groups', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('contact_id');
            $table->integer('group_id')->default(1);
            $table->integer('status')->default(1);
            $table->timestamps();
            $table->index(['contact_id', 'group_id']);
            $table->index(['contact_id']);
            $table->index(['group_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
