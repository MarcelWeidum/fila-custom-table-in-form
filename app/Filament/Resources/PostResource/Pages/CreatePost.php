<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\CreateRecord;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;

    public static function getCreateFormSchema(): array
    {
        return [
            Tabs::make()
                ->tabs([
                    Tab::make('General')
                        ->schema([
                            TextInput::make('title')
                                ->required(),
                        ]),
                ])
                ->columnSpanFull(),
        ];
    }
}
