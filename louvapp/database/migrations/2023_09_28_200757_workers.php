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
        Schema::create('workers', function (Blueprint $table) {
            $table->increments('id'); // Define 'id' como la llave primaria autoincremental
            $table->integer('idJob_jobs');
            $table->integer('idContractor_contractors');
            $table->integer('idIntern_worker');
            $table->string('name');
            $table->string('lastName');
            $table->string('nss')->unique();
            $table->string('nrp');
            $table->string('personalPhone')->nullable();
            $table->string('emergencyPhone');
            $table->string('blodType');
            $table->string('chronicDiseases');
            $table->string('alergies');
            $table->string('imgWorker');
            $table->string('foldeName');
            $table->string('status');
            $table->timestamps();
            $table->foreign('idJob_jobs')->references('idJob')->on('jobs');
            $table->foreign('idContractor_contractors')->references('idContractor')->on('contractors');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workers');
    }
};
