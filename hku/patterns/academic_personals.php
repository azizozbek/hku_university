<?php
/**
 * Title: Academic Personals
 * Slug: hku/academic_personals
 *
 */

/**
 * @return \HKU\Theme\AcademicDTO[]
 */
function academic_personals() {

    if (get_current_blog_id() === 1) {
        return [];
    }

    $facultyId = get_option(\HKU\Theme\AddFacultyOption::OPTION_NAME);
    $getAcademicPersonal = new \HKU\Theme\GetAcademicPersonal();

    // switch temp current locale
    $currentLocale = get_locale();
    switch_to_locale('tr_TR');

    $faculty = \HKU\Theme\FacultyEnum::tryFrom(get_bloginfo('blogname'));
    $department = \HKU\Theme\DepartmentEnum::tryFrom(get_bloginfo('blogname'));
    switch_to_locale($currentLocale);

    if ($facultyId == 0 && !is_null($faculty) ) {
        return $getAcademicPersonal->getByFaculty($faculty);
    }

    if ($facultyId != 0 && !is_null($department)) {
        return $getAcademicPersonal->getByDepartment($department);
    }

    return [];
}

$personals = academic_personals();
?>
<div class="academic">
    <?php
    foreach ($personals as $personal) :
    ?>
        <div class="persons">
            <img class="picture" src="<?php echo $personal->profile_image_path ?>" title="<?php echo $personal->name ?>" loading="lazy">
            <div class="details">
                <h3 class="no-vertical-margin"><?php echo $personal->name ?></h3>
                <ul>
                    <li><?php echo $personal->unvan_gorev; ?></li>
                    <li><?php echo $personal->email; ?></li>
                    <li><?php echo $personal->tel; ?></li>
                    <li>
                        <ul class="links">
                            <li><a href="<?php echo $personal->external_links['google_scholar']; ?>"><span class="dashicons dashicons-admin-links"></span> Google Scholar</a></li>
                            <li><a href="<?php echo $personal->external_links['orcid']; ?>"><span class="dashicons dashicons-admin-links"></span> Orcid</a></li>
                            <li><a href="<?php echo $personal->external_links['yok_academic']; ?>"><span class="dashicons dashicons-admin-links"></span> Yök Academic</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    <?php endforeach; ?>
</div>
