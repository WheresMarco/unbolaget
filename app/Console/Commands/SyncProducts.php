<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\SystembolagetController;

class SyncProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync products from Systembolaget';

    /**
     * Systembolaget Instance.
     *
     * @var SystembolagetController|null
     */
    protected $systembolaget = null;


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->systembolaget = new SystembolagetController();

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $products = $this->systembolaget->getProducts();

        // TODO Only get the products with Type = Beer

        // TODO Create or update based on ProductNumber
        return $products;
    }
}
