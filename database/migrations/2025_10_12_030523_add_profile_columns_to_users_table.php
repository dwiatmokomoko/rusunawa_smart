<?php

// database/migrations/2025_10_12_000001_add_profile_columns_to_users_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nik', 32)->unique()->after('id');
            $table->string('tempat_lahir')->after('name');
            $table->date('tanggal_lahir')->after('tempat_lahir');
            $table->text('alamat')->after('tanggal_lahir');
            $table->string('no_hp', 32)->after('alamat');
            // opsional: kalau sebelumnya belum ada kolom role
            if (!Schema::hasColumn('users','role')) {
                $table->string('role')->default('user')->after('password');
            }
            // Index tambahan opsional
            $table->index('no_hp');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users','nik')) $table->dropUnique(['nik']);
            if (Schema::hasColumn('users','no_hp')) $table->dropIndex(['no_hp']);
            $table->dropColumn(['nik','tempat_lahir','tanggal_lahir','alamat','no_hp','role']);
        });
    }
};

