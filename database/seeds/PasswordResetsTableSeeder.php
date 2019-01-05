<?php

use Illuminate\Database\Seeder;

class PasswordResetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('password_resets')->delete();
        DB::table('password_resets')->insert([
            'email' => 'antonio1@gmail.com',
            'token' => 'XeW3j3v3ZRe1KIe5DcOmzgE4MGPxK23Rk7pXhuCAqZTyBswSyk'
        ]);
        DB::table('password_resets')->insert([
            'email' => 'jose1@gmail.com',
            'token' => 'LrRy1qMd2EBZkTUDNA7KfGZ89sgITGC8njhvqozGP9mGurSLrP'
        ]);
        DB::table('password_resets')->insert([
            'email' => 'francisco1@gmail.com',
            'token' => 'SmRy1qMd2EBZkTUDNA7KfGZ89sgITGC8njhvqozGP9mGurSPrL'
        ]);
        DB::table('password_resets')->insert([
            'email' => 'juanito12@gmail.com',
            'token' => 'JkRy1qMd2BBZkTUDNA7KfGZ89sgITGC8njhvqozGP9mGurMNrK'
        ]);
        DB::table('password_resets')->insert([
            'email' => 'isabella@gmail.com',
            'token' => 'KpOi2qMd2EBZkTUDNA7KfGZ89sgITGC8njhvqozGP9mGurKKiY'
        ]);
        DB::table('password_resets')->insert([
            'email' => 'carmen31@gmail.com',
            'token' => 'AfRg8pMd2EBZkTUDNA7KfGZ89sgITGC8njhvqozGP9mGuoYYtF'
        ]);
    }
}
