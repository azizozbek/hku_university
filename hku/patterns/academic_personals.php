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
                            <li><a href="<?php echo $personal->external_links['google_scholar']; ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#4285f4" d="M256 411.12L0 202.667 256 0z"/><path fill="#356ac3" d="M256 411.12l256-208.453L256 0z"/><circle fill="#a0c3ff" cx="256" cy="362.667" r="149.333"/><path fill="#76a7fa" d="M121.037 298.667c23.968-50.453 75.392-85.334 134.963-85.334s110.995 34.881 134.963 85.334H121.037z"/></svg>
                                    Google Scholar</a></li>
                            <li><a href="<?php echo $personal->external_links['orcid']; ?>">
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                         viewBox="0 0 256 256" style="enable-background:new 0 0 256 256;" xml:space="preserve">
                                    <path fill="#A6CE39" d="M256,128c0,70.7-57.3,128-128,128C57.3,256,0,198.7,0,128C0,57.3,57.3,0,128,0C198.7,0,256,57.3,256,128z"/>
                                        <g fill="white">
                                            <path class="st1" d="M86.3,186.2H70.9V79.1h15.4v48.4V186.2z"/>
                                            <path class="st1" d="M108.9,79.1h41.6c39.6,0,57,28.3,57,53.6c0,27.5-21.5,53.6-56.8,53.6h-41.8V79.1z M124.3,172.4h24.5
                                        c34.9,0,42.9-26.5,42.9-39.7c0-21.5-13.7-39.7-43.7-39.7h-23.7V172.4z"/>
                                            <path class="st1" d="M88.7,56.8c0,5.5-4.5,10.1-10.1,10.1c-5.6,0-10.1-4.6-10.1-10.1c0-5.6,4.5-10.1,10.1-10.1
                                        C84.2,46.7,88.7,51.3,88.7,56.8z"/>
                                        </g>
                                    </svg>
                                    Orcid</a></li>
                            <li><a href="<?php echo $personal->external_links['yok_academic']; ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#e21f26" viewBox="0 0 659.73 317.42">
                                        <path class="cls-1"
                                              d="M91.93,0h34.71l91.27,91.28L311.12.66h34.72L89.36,249.89H54l100.93-97.55L0,1.28,34.07.66l136.27,133,29.58-26.34Z"/>
                                        <path class="cls-1"
                                              d="M560.54,249.89H529L443.76,166.7l-85.7,83.19H323.34L579.82,0h35.34L509.59,103.65,659.73,249.89H626.84L492.4,120.2l-29.56,28Z"/>
                                        <path class="cls-1" d="M144.81,249.89H177.6L433.43,1.11h-36Z"/>
                                        <path class="cls-1" d="M238,249.89h32.77L526.63,1.11h-36Z"/>
                                    </svg>
                                    Yök Academic</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    <?php endforeach; ?>
</div>
