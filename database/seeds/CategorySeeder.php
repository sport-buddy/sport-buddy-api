<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        foreach ($this->getNames() as $name) {
            $category = new Category();
            $category->name = $name;
            $category->saveOrFail();
        }
    }

    private function getNames(): array
    {
        return [
            'Krepšinis',
            'Bėgimas',
            'Stalo tenisas',
            'Gatvės gimnastika',
        ];
    }
}
