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
            $table->id();
            $table->string('fullname')->comment('名前');
            $table->tinyInteger('gender')->comment('性別');
            $table->string('email')->comment('Eメール');
            $table->char('postcode', 8)->comment('郵便番号');
            $table->string('address')->comment('住所');
            $table->string('building_name')->nullable()->comment('建物名');
            $table->text('opinion')->comment('ご意見');
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
        Schema::dropIfExists('contacts');
    }
}
