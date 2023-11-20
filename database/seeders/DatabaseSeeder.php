<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Queue;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Queue::create([
            'name' => 'NORMAL',
            'minNum' => 1,
            'maxNum' => 300,
            'initial' => 'NM',
            'last_number_issued' => null,
            'priority' => 'NORMAL',

        ]);

        Queue::create([
            'name' => 'PRIORITÁRIO',
            'minNum' => 301,
            'maxNum' => 600,
            'initial' => 'PR',
            'last_number_issued' => null,
            'priority' => 'PRIORITÁRIO',

        ]);

        Queue::create([
            'name' => 'MAIS DE 80 ANOS',
            'minNum' => 601,
            'maxNum' => 900,
            'initial' => 'MA',
            'last_number_issued' => null,
            'priority' => 'MAIS DE 80 ANOS',

        ]);
    }
}
