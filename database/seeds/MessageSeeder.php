<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\User;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        if(!$users->isEmpty()){
            $max = count($users);
            $randUserEmail = $users[rand()%$max]['email'];
            $dt = Carbon::now();
            $sendAt = "";
            try{
                $sendAt = $dt->toDateString() . " " . random_int(intval(date('H')), 23) . ":" . random_int(intval(date('i')), 59);
            }catch(Exception $exception)
            {
            }
            DB::table('messages')->insert([
                'message' => Str::random(255),
                'to_user' => $randUserEmail,
                'send_at' => $sendAt,
            ]);
        }
    }
}
