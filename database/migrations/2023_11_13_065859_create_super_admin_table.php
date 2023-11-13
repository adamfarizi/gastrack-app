<?php
// database/migrations/{timestamp}_create_super_admins_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuperAdminTable extends Migration
{
    public function up()
    {
        Schema::create('super_admin', function (Blueprint $table) {
            $table->id('id_super_admin');
            $table->string('nama_super_admin');
            $table->string('email_super_admin')->unique();
            $table->string('password_super_admin');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('super_admin');
    }
}
