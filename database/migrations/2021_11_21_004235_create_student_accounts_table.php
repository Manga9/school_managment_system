<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_accounts', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->string('invoiceType');
            $table->date('date');
            $table->bigInteger('processing_id')->nullable();
            $table->foreign('processing_id')->references('id')->on('processing_fees')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('payment_id')->nullable();
            $table->foreign('payment_id')->references('id')->on('payments')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('receipt_id')->nullable();
            $table->foreign('receipt_id')->references('id')->on('receipt_students')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('fee_invoice_id')->nullable();
            $table->foreign('fee_invoice_id')->nullable()->references('id')->on('fee_invoices')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students')->onUpdate('cascade')->onDelete('cascade');
            $table->decimal('debit',8,2)->nullable();
            $table->decimal('credit',8,2)->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('student_accounts');
    }
}
