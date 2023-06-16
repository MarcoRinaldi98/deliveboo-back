<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('guest_name', 50)->required();
            $table->string('guest_surname', 50)->required();
            $table->string('guest_email', 100)->required();
            $table->string('guest_address', 50)->required();
            $table->string('guest_phone', 15)->required();
            $table->float('amount', 8 , 2)->required();
            $table->boolean('status')->required();
            $table->string('date')->required();

            // possibili soluzioni per la data alla creazione
            // $table->string('date')->useCurrent(Carbon::now()->timestamp);
            // $table->timestamp('created_at')->useCurrent();
            
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
        Schema::dropIfExists('orders');
    }
};
