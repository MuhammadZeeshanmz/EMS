<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Symfony\Contracts\Service\Attribute\Required;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('father_name');
            $table->integer('cnic');
            $table->string('email')->unique();
            $table->integer('cell_no');
            $table->string('image')->nullable();
            $table->date('joining_date');
            $table->date('date_of_birth');
            $table->string('qualification');
            $table->integer('account_no');
            $table->string('guardian_name');
            $table->integer('guardian_no');
            $table->string('designation');
            $table->string('department');
            $table->string('contract');
            $table->string('address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
               Schema::dropIfExists('employees');
    }
};
