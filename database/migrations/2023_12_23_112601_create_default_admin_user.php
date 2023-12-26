<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

class CreateDefaultAdminUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    // Gerar uma senha aleatória


    public function up()
    {
        $mypassword = 'admin2023cadpatri';

        User::create([
            'name' => 'Administrador',
            'email' => 'admin@gmail.com',
            'password' => Hash::make($mypassword),
            'access_level' => 'admin',
            'cpf' => '000.000.000-00',
            'cargo' => 'administrador'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        User::where('email', 'admin@gmail.com')->delete();
    }
}
