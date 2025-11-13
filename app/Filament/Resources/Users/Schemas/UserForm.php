<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Select::make('roles')
                    ->label('Role')
                    ->relationship('roles', 'name')   // relasi roles -> name
                    ->multiple() // harus tetap ada karena relasi Many-to-Many default filament shield
                    ->preload()                       // supaya dropdown cepat muncul
                    ->searchable()
                    ->required()
                    ->maxItems(1), // batasi hanya 1 role

                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                DateTimePicker::make('email_verified_at'),
                TextInput::make('password')
                    ->password()
                    ->required(),
            ]);
    }
}
