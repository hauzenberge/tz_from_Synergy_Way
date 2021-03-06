<?php

use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items =[
            'Австралия', 'Австрия', 'Азербайджан', 'Албания' , 'Алжир',
            'Ангола', 'Андорра', 'Антигуа и Барбуда', 'Аргентина', 'Армения',
            'Афганистан', 'Бангладеш', 'Барбадос', 'Бахрейн', 'Белоруссия', 'Белиз',
            'Бельгия', 'Бенин', 'Болгария', 'Боливия', 'Босния', 'Ботсвана', 'Бразилия', 
            'Бруней', 'Буркина-Фасо', 'Бурунди', 'Бутан', 'Вануату', 'Великобритания', 'Украина',
        ];

        foreach ($items as $item) {
            App\Country::create([
                'name' => $item,
            ]);
        }
    }
}
