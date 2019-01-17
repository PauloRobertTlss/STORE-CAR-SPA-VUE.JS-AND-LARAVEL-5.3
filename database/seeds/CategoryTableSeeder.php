<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->getData() as $m) {
            factory(\StoreTI\Models\Category::class)->create($m);
        }
    }

    private function getData()
    {
            return [
                ['title'=>'Notebook'],
                ['title'=>'Memoria'],
                ['title'=>'Adaptadores'],
                ['title'=>'Suportes'],
                ['title'=>'Desktop'],
                ['title'=>'Ultrabook'],
                ['title'=>'Acessorios'],
                ['title'=>'Audio'],
                ['title'=>'Video'],
                ['title'=>'Placa Video'],
                ['title'=>'Carregadores'],
                ['title'=>'Mesas'],
                ['title'=>'Escritorio'],
                ['title'=>'Game'],
                ['title'=>'Industria']
                ];
    }
}
