<?php

namespace HKU\Theme;

class GetAcademicPersonal extends WpRemote
{
    protected static string $transientKey = 'hku_remote_academic_temp';
    protected static string $optionKey = 'hku_remote_academic';

    protected string $url = "https://api.hku.io/v1/";

    /**
     * @param FacultyEnum $faculty
     * @return AcademicDTO[]
     */
    public function getByFaculty(FacultyEnum $faculty)
    {
        $data = $this->get_remote_data();
        $persons = [];
        foreach ($data as $academical) {
            if ($academical['faculty'] == $faculty->getTranslatedValue()) {
                $persons[] = new AcademicDTO(
                    name: $academical['name'],
                    title: $academical['title'],
                    unvan_gorev: $academical['unvan_gorev'],
                    profile_image_path: $academical['profile_image_path'],
                    department: DepartmentEnum::tryFrom($academical['department']),
                    faculty: FacultyEnum::tryFrom($academical['faculty']),
                    email: $academical['email'],
                    tel: $academical['tel'],
                    status: $academical['status'],
                    is_active: $academical['is_active'],
                    external_links: $academical['external_links']
                );
            }
        }

        return $persons;
    }

    /**
     * @param DepartmentEnum $department
     * @return AcademicDTO[]
     */
    public function getByDepartment(DepartmentEnum $department)
    {
        $data = $this->get_remote_data();
        $persons = [];
        foreach ($data as $academical) {
            if ($academical['department'] == $department->getTranslatedValue()) {
                $department = (DepartmentEnum::tryFrom($academical['department'])) ?: DepartmentEnum::uncategorized;
                $faculty = (FacultyEnum::tryFrom($academical['faculty'])) ?: FacultyEnum::uncategorized;

                $persons[] = new AcademicDTO(
                    name: $academical['name'],
                    title: $academical['title'],
                    unvan_gorev: $academical['unvan_gorev'],
                    profile_image_path: $academical['profile_image_path'],
                    department: $department,
                    faculty: $faculty,
                    email: $academical['email'],
                    tel: $academical['tel'],
                    status: $academical['status'],
                    is_active: $academical['is_active'],
                    external_links: $academical['external_links']
                );
            }
        }

        return $persons;
    }

    public function searchByName(string $name)
    {
        $data = $this->get_remote_data();
        $persons = [];
        $i = 0;
        foreach ($data as $academical) {
            if (str_contains(strtolower($academical['name']), strtolower($name))) {
                $department = (DepartmentEnum::tryFrom($academical['department'])) ?: null;

                $persons[$i]['name'] = $academical['name'];
                $persons[$i]['picture'] = $academical['profile_image_path'];
                $persons[$i]['department'] = $department->getTranslatedValue();
                $persons[$i]['url'] = get_site_url(1) . DIRECTORY_SEPARATOR . $department->name . DIRECTORY_SEPARATOR . "academic";
            }
            $i++;
        }

        return $persons;
    }

    public function get_remote_data() {
        // $json = parent::get_remote_data();
        return [
            [
                'name' => "Aziz Sevim",
                'title' => "Prof. Dr.",
                'unvan_gorev' => "Head of department",
                'profile_image_path' => 'https://ef.hku.edu.tr/wp-content/uploads/2024/12/Ekran-Resmi-2024-12-06-OO%E2%80%AF12.02.29-450x600.png',
                'department' => "Rehberlik ve Psikolojik Danışmanlık",
                'faculty' => 'Eğitim Fakültesi',
                'email' => 'seher.sevim@hku.edu.tr',
                'tel' => '0(342) 211 8080 – 1012',
                'status' => 'full-time',
                'is_active' => true,
                'external_links' => [
                    'google_scholar' => null,
                    'orcid' => null,
                    'yok_academic' => null,
                ]
            ],
            [
                'name' => "Aziz Ozbek",
                'title' => "Dr",
                'unvan_gorev' => "Lecturer",
                'profile_image_path' => 'https://ef.hku.edu.tr/wp-content/uploads/2019/04/ramin-aliyev.jpg',
                'department' => "Rehberlik ve Psikolojik Danışmanlık",
                'faculty' => 'Eğitim Fakültesi',
                'email' => 'aziz.ozbek@hku.edu.tr',
                'tel' => '0(342) 211 8080 – 1012',
                'status' => 'full-time',
                'is_active' => true,
                'external_links' => [
                    'google_scholar' => null,
                    'orcid' => null,
                    'yok_academic' => null,
                ]
            ],
            [
                'name' => "Test Aziz",
                'title' => "Dr",
                'unvan_gorev' => "Lecturer",
                'profile_image_path' => 'https://ef.hku.edu.tr/wp-content/uploads/2019/04/ahmet-ayaz.jpg',
                'department' => "Rehberlik ve Psikolojik Danışmanlık",
                'faculty' => 'Eğitim Fakültesi',
                'email' => 'aziz.ozbek@hku.edu.tr',
                'tel' => '0(342) 211 8080 – 1012',
                'status' => 'full-time',
                'is_active' => true,
                'external_links' => [
                    'google_scholar' => null,
                    'orcid' => null,
                    'yok_academic' => null,
                ]
            ]
        ];
    }
}