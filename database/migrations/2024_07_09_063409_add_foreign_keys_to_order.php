<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('order', function (Blueprint $table) {
            $table->foreign('buyer_id', 'fk_order_buyer_to_users')->references('id')->on('users')
            ->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('freelancer_id', 'fk_order_freelancer_to_users')->references('id')->on('users')
            ->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('service_id', 'fk_order_to_service')->references('id')->on('service')
            ->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('order_status_id', 'fk_order_to_order_status')->references('id')->on('order_status')
            ->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order', function (Blueprint $table) {
            $table->dropForeign('fk_order_buyer_to_users');  
            $table->dropForeign('fk_order_freelancer_to_users');  
            $table->dropForeign('fk_order_to_service');  
            $table->dropForeign('fk_order_to_order_status ');  
        });
    }
};
