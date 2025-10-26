<?php

namespace Database\Seeders\Core;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Enums\ChannelPhone;

class ChannelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function newChannel(string $name_channel): void {
        DB::table('channels')->insert([
            'name' => $name_channel
        ]);
    }
    public function run(): void
    {
        foreach(ChannelPhone::cases() as $channel){
            $this->newChannel($channel->value);
        }
        // Agregar si existe más en App\Enums\ChannelPhone enum...
    }
}
