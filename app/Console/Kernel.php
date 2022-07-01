<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\StatusMengerjakan;
use App\Models\JawabanUser;
use File;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {
            $all = StatusMengerjakan::get();
            $id_status = '';
            $waktu_berakhir = '';
            foreach ($all as $key => $value) {
                $id_status = $value['id_status_mengerjakan'];

                $email_selesai = StatusMengerjakan::join('users', 'users.id_user', '=', 'status_mengerjakan.id_user')->whereRaw('waktu_berakhir > now()')->where('status', 1)->where('id_status_mengerjakan', $id_status)->value('email'); 
                $id_user_selesai = StatusMengerjakan::whereRaw('waktu_berakhir > now()')->where('id_status_mengerjakan', $id_status)->value('email'); 

                $oldJson = File::get(storage_path("app/public/jawaban/".$email_selesai.".json"));
                $jsonData = json_decode($oldJson, true);

                $id_label = [];
                $id_soal = [];
                $jawaban = [];
                $start = [];
                $skor = 0;

                foreach ($jsonData as $key => $entry) {
                    array_push($id_label, $jsonData[$key]['id_label']);
                    array_push($id_soal, $jsonData[$key]['id_soal']);
                    array_push($jawaban, $jsonData[$key]['jawaban']);
                    array_push($start, $jsonData[$key]['waktu_mengerjakan']);
                    $kunci = Soal::where('id_soal', $jsonData[$key]['id_soal'])->value('kunci');
                    if($jsonData[$key]['jawaban'] == $kunci){
                        $skor = $skor + 1;
                    } else {
                        $skor = $skor + 0;
                    }
                }

                $id_label = $id_label[0];
                $start = $start[0];

                $id_soal_imploded = implode(",", $id_soal);
                $jawaban_imploded = implode(",", $jawaban);

                $check = JawabanUser::where('id_user', $id_user_selesai)->where('id_label_soal', $id_label)->where('tgl_mengerjakan', $start)->first();

                StatusMengerjakan::whereRaw('waktu_berakhir > now()')->where('id_status_mengerjakan', $id_status)->update(['status' => 2]);

                if(empty($check)){
                    $data = JawabanUser::insert([
                        'id_user' => $id_user_selesai,
                        'id_label_soal' => $id_label,
                        'tgl_mengerjakan' => $start,
                        'jawaban_user' => $jawaban_imploded,
                        'id_soal' => $id_soal_imploded,
                        'skor' => $skor
                    ]);
                }

                File::delete(storage_path("app/public/jawaban/".$email_selesai.".json"));
            }
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
