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
        
        Schema::create('contractors', function (Blueprint $table) {
            $table->integer('idContractor');
            $table->integer('idIntern');
            $table->integer('idProject_project');
            $table->string('contractorName');
            $table->string('email');
            $table->string('phone');
            $table->string('whatsapp');
            $table->string('img_contractor');
            $table->string('folderName');
            $table->primary('idContractor');
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
        Schema::dropIfExists('contractors');
    }
};
