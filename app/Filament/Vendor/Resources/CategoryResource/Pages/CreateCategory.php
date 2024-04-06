<?php

namespace App\Filament\Vendor\Resources\CategoryResource\Pages;

use App\Filament\Vendor\Resources\CategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;
}
