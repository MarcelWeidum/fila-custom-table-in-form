<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ViewField;
use Filament\Resources\Pages\EditRecord;

class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    public static function getEditFormSchema(): array
    {
        return [
            Tabs::make()
                ->tabs([
                    Tab::make('General')
                        ->schema([
                            TextInput::make('title')
                                ->required(),
                        ]),
                    Tab::make('Docs')
                        ->schema([
                            ViewField::make('documents')
                                ->dehydrated(false)
                                ->view('filament.posts.documents'),
                        ]),
                ])
                ->columnSpanFull(),
        ];
    }
}
