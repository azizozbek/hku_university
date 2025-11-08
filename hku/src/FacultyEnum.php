<?php

namespace HKU\Theme;

enum FacultyEnum: string
{

    case uncategorized = "uncategorized";
    case ef = "Eğitim Fakültesi";
    case eng = "Mühendislik Fakültesi";

    public function getTranslatedValue(): string
    {
        return match($this) {
            FacultyEnum::uncategorized => __("Kategorisiz", 'hku'),
            FacultyEnum::ef => __("Eğitim Fakültesi", 'hku'),
            FacultyEnum::eng => __("Mühendislik Fakültesi", 'hku')
        };
    }

}
