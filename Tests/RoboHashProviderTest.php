<?php

use Phpmedia\RoboHashProvider\RoboHashProvider;

class RoboHashProviderTest extends PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider roboHashDataProvider
     */
    public function testImageUrl($expected, $size, $text = null, $format = 'png', $set = '', $background = '')
    {


        $img = RoboHashProvider::avatarUrl($size, $text, $format, $set, $background);

        $this->assertEquals('http://robohash.org/' . $expected, $img);
    }


    /**
     * Data provider
     *
     * @return array
     */
    public function roboHashDataProvider()
    {
        return [
            [
                'dummy.png?size=100x100',
                '100x100', 'dummy',
            ],
            [
                'dummy.gif?size=100x100',
                '100x100', 'dummy', 'gif',
            ],
            [
                'dummy.png?size=100x100',
                '100x100', 'dummy', 'tif',
            ],
            [
                'dummy.png?size=50x50',
                '50x50', 'dummy',
            ],
            [
                'dummy.png?size=100x100',
                array('width' => 100, 'height' => 100), 'dummy',
            ],
            [
                'dummy.png?size=100x100',
                '100x100', 'dummy', '', 'set1', '',
            ],
            [
                'dummy.png?size=100x100&set=set2',
                '100x100', 'dummy', '', 'set2', '',
            ],
            [
                'dummy.png?size=100x100&bgset=bg1',
                '100x100', 'dummy', '', '', 'bg1',
            ],
            [
                'dummy.png?size=100x100',
                '100x100', 'dummy', '', '', 'fake',
            ],
            [
                'dummy.gif?size=100x100&set=set2&bgset=bg1',
                '100x100', 'dummy', 'gif', 'set2', 'bg1',
            ],
            [
                'dummy.png?size=200x200&set=set2&bgset=bg1',
                '200x200', 'dummy', 'png', 'set2', 'bg1',
            ],
        ];
    }

}
