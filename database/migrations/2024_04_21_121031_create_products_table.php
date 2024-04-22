<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        public function up()
        {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('category_id');
                $table->foreign('category_id')->references('id')->on('categories');
                $table->string('name');
                $table->double('purchase_price');
                $table->double('selling_price');
                $table->integer('stock');
                $table->string('image');
                $table->timestamps();
                $table->softDeletes();
            });
        }

        public function down()
        {
            Schema::dropIfExists('products');
        }
    };
