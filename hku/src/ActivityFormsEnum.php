<?php

namespace HKU\Theme;

enum ActivityFormsEnum: string
{

case online = 'online';
case facetoface = 'facetoface';
case hybrid = 'hybrid';

    public function getTranslatedValue(): string
    {
        return match($this) {
            ActivityFormsEnum::online => __('Online', 'hku'),
            ActivityFormsEnum::facetoface => __('Yüz Yüze', 'hku'),
            ActivityFormsEnum::hybrid => __('Hibrit', 'hku'),
        };
    }

    public static function getAsArray(): array
    {
        return [
            ActivityFormsEnum::online->value => __('Online', 'hku'),
            ActivityFormsEnum::facetoface->value => __('Yüz Yüze', 'hku'),
            ActivityFormsEnum::hybrid->value => __('Hibrit', 'hku'),
        ];
    }
}
