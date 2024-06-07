<?php

namespace App\Filament\Resources\ExpeditionResource\Pages;

use App\Filament\Resources\ExpeditionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\Page;
use GuzzleHttp\Promise\Create;

class CreateExpedition extends CreateRecord
{
    protected static string $resource = ExpeditionResource::class;
    protected static ?string $title = 'Expeditions des colis';

    protected function getRedirectUrl(): string
    {
        return route('generate-pdf', $this->record->id);
        }         
    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Colis envoiyer';
    }
  //  public static function getWidgets(): array
   // {
        //return [
           // ExpeditionResource\Widgets\ListExpeditionsWidget::class,
      //  ];
   // }


}
