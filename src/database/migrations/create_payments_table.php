<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->text('redirection_url');
            $table->integer('cart_id')->nullable();
            $table->string('order_id');
            $table->string('transaction_id')->nullable();
            $table->timestamp('expiration')->nullable();
            $table->float('amount')->nullable();
            $table->float('cost')->nullable();
            $table->string('message', 100)->nullable();
            $table->string('payer', 15)->nullable();
            $table->integer('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
