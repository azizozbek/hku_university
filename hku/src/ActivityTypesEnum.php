<?php

namespace HKU\Theme;

enum ActivityTypesEnum: string
{

case student_activity = 'student_activity';
case education = 'education';
case seminar = 'seminar';
case symposium = 'symposium';
case presentation = 'presentation';
case exhibition = 'exhibition';
case congress = 'congress';
case panel = 'panel';
case conference = 'conference';
case concert = 'concert';
case sport_activity = 'sport_activity';
case workshop = 'workshop';
case meeting = 'meeting';
case social_responsibility = 'social_responsibility';
case theatre = 'theatre';
case conversation = 'conversation';
case program = 'program';
case fair = 'fair';
case tasarim = 'tasarim';


    public function getTranslatedValue(): string
    {
        return match($this) {
            ActivityTypesEnum::student_activity => __('Öğrenci Topluluğu Etkinliği', 'hku'),
            ActivityTypesEnum::education => __('Eğitim', 'hku'),
            ActivityTypesEnum::seminar => __('Seminer', 'hku'),
            ActivityTypesEnum::symposium => __('Sempozyum', 'hku'),
            ActivityTypesEnum::presentation => __('Poster Sunumu', 'hku'),
            ActivityTypesEnum::exhibition => __('Sergi', 'hku'),
            ActivityTypesEnum::conference => __('Konferenz', 'hku'),
            ActivityTypesEnum::concert => __('Konser', 'hku'),
            ActivityTypesEnum::sport_activity => __('Sportif Etkinlik', 'hku'),
            ActivityTypesEnum::workshop => __('Çalıştay', 'hku'),
            ActivityTypesEnum::meeting => __('Buluştay', 'hku'),
            ActivityTypesEnum::social_responsibility => __('Sosyal Sorumluluk Projesi', 'hku'),
            ActivityTypesEnum::theatre => __('Tiyatro', 'hku'),
            ActivityTypesEnum::fair => __('Fuar', 'hku'),
            ActivityTypesEnum::program => __('Program', 'hku'),
            ActivityTypesEnum::tasarim => __('Tasarım', 'hku'),
            ActivityTypesEnum::conversation => __('Söyleşi', 'hku'),
            ActivityTypesEnum::panel => __('Panel', 'hku'),
            ActivityTypesEnum::congress => __('Kongres', 'hku'),
        };
    }

    public static function getAsArray(): array
    {
        return [
            ActivityTypesEnum::student_activity->value => __('Öğrenci Topluluğu Etkinliği', 'hku'),
            ActivityTypesEnum::education->value => __('Eğitim', 'hku'),
            ActivityTypesEnum::seminar->value => __('Seminer', 'hku'),
            ActivityTypesEnum::symposium->value => __('Sempozyum', 'hku'),
            ActivityTypesEnum::presentation->value => __('Poster Sunumu', 'hku'),
            ActivityTypesEnum::exhibition->value => __('Sergi', 'hku'),
            ActivityTypesEnum::conference->value => __('Konferenz', 'hku'),
            ActivityTypesEnum::concert->value => __('Konser', 'hku'),
            ActivityTypesEnum::sport_activity->value => __('Sportif Etkinlik', 'hku'),
            ActivityTypesEnum::workshop->value => __('Çalıştay', 'hku'),
            ActivityTypesEnum::meeting->value => __('Buluştay', 'hku'),
            ActivityTypesEnum::social_responsibility->value => __('Sosyal Sorumluluk Projesi', 'hku'),
            ActivityTypesEnum::theatre->value => __('Tiyatro', 'hku'),
            ActivityTypesEnum::fair->value => __('Fuar', 'hku'),
            ActivityTypesEnum::program->value => __('Program', 'hku'),
            ActivityTypesEnum::tasarim->value => __('Tasarım', 'hku'),
            ActivityTypesEnum::conversation->value => __('Söyleşi', 'hku'),
            ActivityTypesEnum::panel->value => __('Panel', 'hku'),
            ActivityTypesEnum::congress->value => __('Kongres', 'hku'),
        ];
    }

}
