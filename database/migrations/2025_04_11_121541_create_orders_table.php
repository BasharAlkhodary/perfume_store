<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('name');
            // $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            // $table->foreignId('perfume_id')->constrained()->onDelete('cascade');
            $table->float('total_price')->nullable(); // اجمالي مبلغ الطلبية 
            $table->enum('delivery', ['yes', 'no']); // شامل التوصيل ام لا
            // $table->foreignId('glass_id')->constrained()->onDelete('cascade');
            // $table->integer('size_glass'); // حجم الزجاجة المطلوبة
            // $table->string('color_glass'); // لون الزجاجة المطلوبة
            $table->text('notes')->nullable();
            $table->softDeletes();
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
