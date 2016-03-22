<?php

namespace Phpmedia\RoboHashProvider;

use Faker\Provider\Base as Base_Provider;

/**
 * robohash.org provider for Faker.
 *
 * @author Dirk Diebel <phpmedia@gmail.com>
 *
 * @link http://robohash.org
 */
class RoboHashProvider extends Base_Provider
{
    const ROBOHASH_URL = 'http://robohash.org/';

    /**
     * image-url generator to a Robohash roboter avatar
     *
     * @param string|array $size Size can be an array with width and height or a string like 100x100
     * @param string $text Optional: Is used to generate the unique avatar.
     * @param string $format Optional: File-Extension. Possible are jpg, gif and png. Default ist png
     * @param string $set Optional: Defines the set of roboters to use. Possible are set2 & set3. Default ist set1
     * @param string $background Optional: Defines a background-set. Possible are bg1 and bg2. Default is null
     *
     * @return string
     */
    public static function avatarUrl($size, $text = null, $format = 'png', $set = '', $background = '')
    {
        $sets = array('', 'set2', 'set3');
        $backgroundSets = array('', 'bg1', 'bg2');
        $ext = array('jpg', 'png', 'gif');

        $generatedUrl = self::ROBOHASH_URL;

        /**
         * set image size
         */
        if (is_array($size)) {
            ksort($size);
            $size = implode('x', $size);
        }

        if (!in_array($format, $ext)) {
            $format = 'png';
        }

        if (!in_array($set, $sets)) {
            $set = '';
        }

        if (!in_array($background, $backgroundSets)) {
            $background = '';
        }

        $fileName = ($text != '') ? urlencode($text) : md5(time());

        $urlParams = array('size' => $size);

        if ($set != '') $urlParams['set'] = $set;
        if ($background != '') $urlParams['bgset'] = $background;

        $generatedUrl .= $fileName . '.' . $format . '?' . http_build_query($urlParams);

        return $generatedUrl;
    }
}