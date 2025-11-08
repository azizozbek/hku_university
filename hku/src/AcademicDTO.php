<?php

namespace HKU\Theme;

readonly class AcademicDTO
{
    public function __construct(
        public string         $name,
        public string         $title,
        public string         $unvan_gorev,
        public string         $profile_image_path,
        public DepartmentEnum $department,
        public FacultyEnum    $faculty,
        public string         $email,
        public string         $tel,
        public string         $status,
        public bool           $is_active,
        public array          $external_links,
    )
    {

    }
}