<?php

namespace App\Livewire;

use App\Models\Post;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;

class PostDocuments extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function table(Table $table): Table
    {
        return $table
            ->query($this->post->documents()->getQuery())
            ->columns([
                TextColumn::make('title'),
            ])
            ->headerActions([
                Action::make('new_document')
                    ->button()
                    ->icon('heroicon-o-plus')
                    ->form([
                        TextInput::make('title'),
                    ])
                    ->action(function (array $data): void {
                        $this->post->documents()->create($data);

                        Notification::make()
                            ->title('Document added')
                            ->success()
                            ->send();
                    }),
            ]);
    }

    public function render()
    {
        return view('livewire.post-documents');
    }
}
