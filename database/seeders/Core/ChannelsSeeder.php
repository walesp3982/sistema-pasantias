<?php

namespace Database\Seeders\Core;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChannelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $channels = [
            'Whatsapp',
            'Fijo',
            'Telegram'
        ];

        foreach($channels as $channel) {
            DB::table('channels')->insert([
                'name' => $channel
            ]);
        }
    }
}
