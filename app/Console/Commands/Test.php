<?php

namespace App\Console\Commands;

use App\Models\Timetable;
use App\Services\GeneticAlgorithm\TimetableGA;

use Illuminate\Console\Command;
use App\Jobs\GenerateTimetable;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test';

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
        $this->timetable = Timetable::find(2);
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        \Log::info('Generating timetable');
        $timetableGA = new TimetableGA($this->timetable);
        $timetableGA->run();
        //dispatch(new GenerateTimetable());
    }
}
