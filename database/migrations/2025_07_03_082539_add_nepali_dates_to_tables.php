<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add nepali date fields to leaves table
        Schema::table('leaves', function (Blueprint $table) {
            $table->string('nepali_start_date')->nullable()->after('start_date');
            $table->string('nepali_end_date')->nullable()->after('end_date');
        });

        // Add nepali date fields to attendances table
        Schema::table('attendances', function (Blueprint $table) {
            $table->string('nepali_date')->nullable()->after('date');
        });

        // Add nepali date fields to employees table (for date_of_joining and dob)
        Schema::table('employees', function (Blueprint $table) {
            $table->string('nepali_date_of_joining')->nullable()->after('date_of_joining');
            $table->string('nepali_dob')->nullable()->after('dob');
        });

        // Add nepali date fields to payrolls table
        Schema::table('payrolls', function (Blueprint $table) {
            $table->string('nepali_pay_date')->nullable()->after('pay_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('leaves', function (Blueprint $table) {
            $table->dropColumn(['nepali_start_date', 'nepali_end_date']);
        });

        Schema::table('attendances', function (Blueprint $table) {
            $table->dropColumn('nepali_date');
        });

        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn(['nepali_date_of_joining', 'nepali_dob']);
        });

        Schema::table('payrolls', function (Blueprint $table) {
            $table->dropColumn('nepali_pay_date');
        });
    }
};
