<?php

    namespace Database\Seeders;

    use App\Models\User;
    use Carbon\Carbon;
    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\Hash;

    class UserSeeder extends Seeder
    {
        public function run()
        {
            $user = [
                'name' => 'Firman Herda',
                'email' => 'firmanherda26@gmail.com',
                'password' => Hash::make('12345678'),
                'candidate_position' => 'Web Programmer',
                'image' => 'firman.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];

            User::create($user);
        }
    }
