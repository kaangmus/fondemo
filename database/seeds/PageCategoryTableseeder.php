<?php

use Illuminate\Database\Seeder;
use App\ContentPage;
class PageCategoryTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContentPage::findOrFail(1)->categories()->sync(1);
        ContentPage::findOrFail(2)->categories()->sync(1);
        ContentPage::findOrFail(3)->categories()->sync(1);
        ContentPage::findOrFail(4)->categories()->sync(1);
        ContentPage::findOrFail(5)->categories()->sync(1);
        ContentPage::findOrFail(6)->categories()->sync(1);
        ContentPage::findOrFail(7)->categories()->sync(1);
        ContentPage::findOrFail(8)->categories()->sync(2);
        ContentPage::findOrFail(9)->categories()->sync(2);
    }
}
