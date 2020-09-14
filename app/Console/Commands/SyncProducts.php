<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\SystembolagetController;
use App\Models\Product;

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
        $this->info("Starting sync");

        $products = $this->systembolaget->getProducts();

        $this->info("Data fetched");

        // TODO Add error handling.

        // TODO Only get the products with Type = Beer
        if ($products) {
            foreach ($products as $product) {
                $this->info("Adding/updating {$product['ProductId']}");

                Product::updateOrCreate(
                    [
                        'product_id' => $product['ProductId'],
                    ],
                    [
                        'product_name_bold' => $product['ProductNameBold'] ?? '',
                        'product_name_thin' => $product['ProductNameThin'] ?? '',
                        'product_nr' => $product['ProductNumberShort'] ?? '',
                        'bottle_text' => $product['BottleTextShort'] ?? '',
                        'is_organic' => $product['IsOrganic'] ?? false,
                        'is_ethical' => $product['IsEthical'] ?? false,
                        'is_web_launch' => $product['IsWebLaunch'] ?? false,
                        'sell_start_date' => $product['SellStartDate'] ?? '',
                        'is_completely_out_of_stock' => $product['IsCompletelyOutOfStock'] ?? false,
                        'is_temporary_out_of_stock' => $product['IsTemporaryOutOfStock'] ?? false,
                        'alcohol_percentage' => $product['AlcoholPercentage'] ?? 0.0,
                        'volume' => $product['Volume'] ?? 0.0,
                        'price' => $product['Price'] ?? 0.0,
                        'country' => $product['Country'] ?? '',
                        'origin_level_1' => $product['OriginLevel1'] ?? '',
                        'origin_level_2' => $product['OriginLevel2'] ?? '',
                        'vintage' => $product['Vintage'] ?? 0,
                        'sub_category' => $product['SubCategory'] ?? '',
                        'type' => $product['Type'] ?? '',
                        'style' => $product['Style'] ?? '',
                        'beverage_description' => $product['BeverageDescriptionShort'] ?? '',
                        'assortment_text' => $product['AssortmentText'] ?? '',
                        'usage' => $product['Usage'] ?? '',
                        'taste' => $product['Taste'] ?? '',
                        'assortment' => $product['Assortment'] ?? '',
                        'is_news' => $product['IsNews'] ?? false,
                    ]
                );

                // TODO Add product to category.
                // TODO Add product to producer.
            }
        } else {
            $this->error('No products from the API. API key? Rate limiting?');
            return;
        }

        $this->info('Done');
    }
}
