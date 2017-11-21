<?php

namespace app\Console\Commands;

use App\Models\Pics;
use App\Models\SocketIoUtil;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;

class NextCommand extends Command
{
    const BEARBEITET = '_bearbeitet';

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'next';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Evaluate the next picture and trigger browsers to reload.";

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $pics = Pics::nextPic();

        $this->info('Next pic is ' . $pics->id . ': ' . $pics->path);

        SocketIoUtil::notifyNextPic();

        $this->info('Browsers notified.');

    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return array(
            array('host', null, InputOption::VALUE_OPTIONAL, 'The host address to serve the application on.', 'localhost'),

            array('port', null, InputOption::VALUE_OPTIONAL, 'The port to serve the application on.', 8000),
        );
    }

}
