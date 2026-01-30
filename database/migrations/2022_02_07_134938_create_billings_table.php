<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billings', function (Blueprint $table) {

            $table->id();
            $table->bigInteger('amount')->nullable(false);
            $table->date('due_date')->nullable(true);
            $table->text('description')->nullable(true);
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients')->cascadeOnDelete();

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
        Schema::table('billings', function ($table) {
            $table->dropForeign('billings_client_id_foreign');
        });

        Schema::dropIfExists('billings');
    }
}
