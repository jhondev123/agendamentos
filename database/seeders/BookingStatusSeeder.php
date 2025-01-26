<?php

namespace Database\Seeders;

use App\Models\BookingStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        BookingStatus::create([
            ['name' => 'Pending', 'description' => 'The booking is pending'],
            ['name' => 'Approved', 'description' => 'The booking is approved'],
            ['name' => 'Rejected', 'description' => 'The booking is rejected'],
            ['name' => 'Cancelled', 'description' => 'The booking is Cancelled'],
        ]);
    }
}
