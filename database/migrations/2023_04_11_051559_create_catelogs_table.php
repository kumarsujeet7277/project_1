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
        Schema::create('catelogs', function (Blueprint $table) {
            $table->id();
            $table->string('catelog_name');
            $table->integer('article_no');
            $table->decimal('sale_price', 8, 2);
            $table->string('panna');
            $table->string('fabric_name');
            $table->tinyInt('fc_unit');
            $table->integer('unit');
            $table->string('search_tags');
            $table->text('note_for_reference')->nullable();
            $table->text('instructions_for_fabricator')->nullable();
            $table->string('catelog_assignee');
            $table->string('catelog_manager');
            $table->boolean('catelog_access')->nullable();
            $table->binary('image');
            $table->string('pdf_file');
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
        Schema::dropIfExists('catelogs');
    }
};
