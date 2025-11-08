<?php
/**
 * Title: List activity details
 * Slug: hku/activity_properties
 * Categories: query
 * Block Types: core/query
 *
 */

use HKU\Theme\ActivityFormsEnum;
use HKU\Theme\ActivityTypesEnum;

global $post;

$args = array(
    'post_type' => \HKU\Theme\PostTypeActivity::POST_TYPE,
    'post_status' => 'publish',
    'post_id' => $post->ID
);

$query = new WP_Query( $args );

$list = [];

$activity_start = (get_field('hku_activity_start')) ? get_field('hku_activity_start') : get_post_meta($post->ID, 'hku_activity_start', true);
$start = ($activity_start != "") ? (new \DateTimeImmutable($activity_start))->format('d F Y H:i') : null;
$list['Başlangıç'] = $start;

$activity_end = (get_field('hku_activity_end')) ? get_field('hku_activity_end') : get_post_meta($post->ID, 'hku_activity_end', true);
$end = ($activity_end != "") ? (new \DateTimeImmutable($activity_end))->format('d F Y H:i') : null;
$list['Bitiş'] = $end;

$form = (get_field('hku_activity_form')) ? ActivityFormsEnum::tryFrom(get_field('hku_activity_form'))->getTranslatedValue() : ActivityFormsEnum::hybrid->getTranslatedValue();
$list['Katılım Şekli'] = $form;

$type = (get_field('hku_activity_type')) ? \HKU\Theme\ActivityTypesEnum::tryFrom(get_field('hku_activity_type'))->getTranslatedValue() : ActivityTypesEnum::seminar->getTranslatedValue();
$list['Tür'] = $type;

$location = (get_field('hku_activity_place')) ? get_field('hku_activity_place') : null;
$list['Yer'] = $location;

$output = '<ul class="properties">';
foreach ($list as $activity => $key) {
    if ($activity) {
        $output .= '<li class="hover-red">'. __($activity) . ': ' . $key .'</li>';
    }
}
$output .= '</ul>';

echo $output;
?>