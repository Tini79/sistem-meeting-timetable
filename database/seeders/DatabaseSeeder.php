<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Staff;
use App\Models\Client;
use App\Models\Activity;
use App\Models\Assignment;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Staff::factory(10)->create();

        Client::factory(15)->create();

        $activities = [
            [
                'activity' => 'Introduction'
            ],
            [
                'activity' => 'Analisis'
            ],
            [
                'activity' => 'Pelatihan'
            ],
        ];

        foreach ($activities as $activity) {
            Activity::create($activity);
        }

        Assignment::factory(5)->create();

        User::create([
            'staff_id' => 1,
            'username' => 'Admin',
            'password' => bcrypt('admin'),
            'level'    => 'Admin'
        ]);

        User::create([
            'staff_id' => 2,
            'username' => 'Staff',
            'password' => bcrypt('staff'),
            'level'    => 'Staff',
        ]);

        User::create([
            'staff_id' => 3,
            'username' => 'Pimpinan',
            'password' => bcrypt('pimpinan'),
            'level'    => 'Pimpinan',
        ]);
    }
}
