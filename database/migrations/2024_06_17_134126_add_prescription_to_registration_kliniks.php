<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPrescriptionToRegistrationKliniks extends Migration
{
    public function up()
    {
        Schema::table('registration_kliniks', function (Blueprint $table) {
            $table->text('prescription')->nullable()->after('complaint');
        });
    }

    public function down()
    {
        Schema::table('registration_kliniks', function (Blueprint $table) {
            $table->dropColumn('prescription');
        });
    }
}
