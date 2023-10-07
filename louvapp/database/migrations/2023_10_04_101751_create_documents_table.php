<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->unsignedBigInteger('idWorker_workers');
            $table->timestamps();

            
        });
    }

    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
