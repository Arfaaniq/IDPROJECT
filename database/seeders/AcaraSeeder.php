<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Acara;
use App\Models\Event;

class AcaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // membuat event
         $days = [[1,3], 5, 6, 9, [12,13]];
         $fake = fake('id');
         $today = date('Y-m-d');

         // looping
        // foreach ($days as $day) {
        //     if (is_array($day)) {
        //         $acara[]=[
        //             'title' => $fake->sentence(3),
        //             'start_date' => date('Y-m-d', strtotime($today. '+ '.$day[0].' days')),
        //             'end_date' => date('Y-m-d', strtotime($today. '+ '.$day[1].' days')),
        //             'category' => $fake->randomElement(['success', 'danger', 'warning', 'info']),
        //             'created_at' => now(),
        //             'update_at' => now(),
        //         ];

        //     } else {
        //         $acara[]=[
        //             'title' => $fake->sentence(3),
        //             'start_date' => date('Y-m-d', strtotime($today. '+ '.$day.' days')),
        //             'end_date' => date('Y-m-d', strtotime($today. '+ '.$day.' days')),
        //             'category' => $fake->randomElement(['success', 'danger', 'warning', 'info']),
        //             'created_at' => now(),
        //             'update_at' => now(),
        //         ];
        //     }
        // }

        // Event::insert($acara);
    }
}