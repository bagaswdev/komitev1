<?php

namespace App\Filament\Resources\ProgramKegiatans\Pages;

use App\Filament\Resources\ProgramKegiatans\ProgramKegiatanResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewProgramKegiatan extends ViewRecord
{
    protected static string $resource = ProgramKegiatanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
