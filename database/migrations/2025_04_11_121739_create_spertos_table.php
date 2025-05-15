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
        Schema::create('spertos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('concentration');
            $table->float('price');
            $table->string('picture')->nullable(); // مسار الصورة
            $table->integer('size'); // بالحجم ml، مثل 100 أو 50
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
