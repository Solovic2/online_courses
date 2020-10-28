<?php

namespace App\Console\Commands;

use App\Models\Month;
use Illuminate\Console\Command;

class ExpireMonth extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expire:month';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $months = Month::with('students')->get();
        foreach ($months as $month){
            foreach ($month->students as $student){
                if( $student->pivot->activate >  $student->pivot->deactivate ){
                    $month->students()->detach($student->id);
                }
            }
        }
    }
}
