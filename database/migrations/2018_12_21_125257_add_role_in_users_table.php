<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRoleInUsersTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::table('users', function (Blueprint $table) {
      $table->string('role', 100)->after('remember_token');
      $table->softDeletes();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::table('users', function (Blueprint $table) {
      $table->dropColumn('role');
      $table->dropColumn('deleted_at');
    });
  }

}
