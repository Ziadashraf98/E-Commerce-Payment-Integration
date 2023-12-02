<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Currency::truncate();

        Currency::create([
            'name'=>['en'=>'Egyptian Bound' , 'ar'=>'جنيه مصري'],
            'code'=>['en'=>'EGP' , 'ar'=>'جنيه'],
            'status'=>true,
        ]);
        
        Currency::create([
            'name'=>['en'=>'USA Dollar' , 'ar'=>'دولار امريكى'],
            'code'=>['en'=>'$' , 'ar'=>'دولار'],
            'status'=>false,
        ]);
    }
}
