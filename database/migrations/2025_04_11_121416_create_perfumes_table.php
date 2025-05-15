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
        Schema::create('perfumes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('picture')->nullable(); // مسار الصورة
            $table->text('description')->nullable();
            $table->enum('gender', ['male', 'female','unisex']);
            $table->integer('size'); // بالحجم ml، مثل 100 أو 50
            // $table->foreignId('company_factor_id')->constrained()->onDelete('cascade');
            // $table->string('concentration_type');
            $table->float('price');
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
        Schema::dropIfExists('perfumes');
    }
};
