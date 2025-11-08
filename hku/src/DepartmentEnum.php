<?php

namespace HKU\Theme;

enum DepartmentEnum: string
{

    case uncategorized = "uncategorized";

    case it = 'Bilgisayar Mühendisliği';
    case civil = 'İnşaat Mühendisliği';
    case pdr = 'Rehberlik ve Psikolojik Danışmanlık';

    public function getTranslatedValue(): string
    {
        return match($this) {
            DepartmentEnum::uncategorized => __("Kategorisiz", 'hku'),
            DepartmentEnum::it => __("Bilgisayar Mühendisliği", 'hku'),
            DepartmentEnum::civil => __("İnşaat Mühendisliği", 'hku'),
            DepartmentEnum::pdr => __("Rehberlik ve Psikolojik Danışmanlık", 'hku'),
        };
    }

}
