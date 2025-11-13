<?php

namespace App\Filament\Resources\PaguTahunAnggarans\Pages;

use App\Filament\Resources\PaguTahunAnggarans\PaguTahunAnggaranResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePaguTahunAnggaran extends CreateRecord
{
    protected static string $resource = PaguTahunAnggaranResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
