<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name','50');
            $table->string('phone','25');
            $table->string('photo','100')->nullable(true);
            $table->string('address','105')->nullable(true);
            $table->string('second_number','25')->nullable(true);
            $table->integer('status')->default(1);
            $table->timestamps();
            $table->index(['name', 'phone']);
            $table->index(['name']);
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
