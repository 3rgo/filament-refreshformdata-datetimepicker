<?php

namespace App\Filament\Resources\EventResource\Pages;

use App\Filament\Resources\EventResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEvent extends EditRecord
{
    protected static string $resource = EventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\Action::make('clear_registration_end')
                ->action(function ($record) {
                    $record->registration_end = null;
                    $record->save();
                    $this->refreshFormData(['registration_end']);
                }),
            Actions\Action::make('random_registration_end')
                ->action(function ($record) {
                    $record->registration_end = fake()->dateTimeBetween('now', '+1 year');
                    $record->save();
                    $this->refreshFormData(['registration_end']);
                }),
        ];
    }
}
