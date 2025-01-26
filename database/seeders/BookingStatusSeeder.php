<?php

namespace Database\Seeders;

use App\Models\BookingStatus;
use Illuminate\Database\Seeder;

class BookingStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        BookingStatus::create([
            'name' => 'Pending',
            'description' => 'The booking is pending',
        ]);

        BookingStatus::create([
            'name' => 'Approved',
            'description' => 'The booking is approved',
        ]);

        BookingStatus::create([
            'name' => 'Rejected',
            'description' => 'The booking is rejected',
        ]);

        BookingStatus::create([
            'name' => 'Cancelled',
            'description' => 'The booking is cancelled',
        ]);
    }
}
