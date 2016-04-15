<?php
/**
 * Copyright (c) 2016-present, Facebook, Inc.
 * All rights reserved.
 *
 * This source code is licensed under the license found in the
 * LICENSE file in the root directory of this source tree.
 */
namespace Facebook\InstantArticles\Elements;

use Facebook\InstantArticles\Elements\GeoTag;
use Facebook\InstantArticles\Elements\Caption;

class GeoTagTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
    }

    public function testRenderWithGeotag()
    {
        $script =
            '{'.
                '"type": "Feature",'.
                '"geometry": {'.
                    '"type": "Point",'.
                    '"coordinates": [23.166667, 89.216667]'.
                '},'.
                '"properties": {'.
                    '"title": "Jessore, Bangladesh",'.
                    '"radius": 750000,'.
                    '"pivot": true,'.
                    '"style": "satellite"'.
                '}'.
            '}';

        $geo_tag = GeoTag::create()->withScript($script);

        $expected =
            '<script type="application/json" class="op-geotag">'.
                $script.
            '</script>';

        $rendered = $geo_tag->render();
        $this->assertEquals($expected, $rendered);
    }
}
