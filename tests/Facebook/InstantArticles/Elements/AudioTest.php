<?hh
/**
 * Copyright (c) 2016-present, Facebook, Inc.
 * All rights reserved.
 *
 * This source code is licensed under the license found in the
 * LICENSE file in the root directory of this source tree.
 */
namespace Facebook\InstantArticles\Elements;

class AudioTest extends \Facebook\Util\BaseHTMLTestCase
{
    public function testRenderEmpty(): void
    {
        $audio = Audio::create();

        $expected = '';

        $rendered = $audio->render();
        $this->assertEquals($expected, $rendered);
    }

    public function testRenderBasic(): void
    {
        $audio =
            Audio::create()
                ->withURL('http://foo.com/mp3');

        $expected =
            '<audio>'.
                '<source src="http://foo.com/mp3"/>'.
            '</audio>';

        $rendered = $audio->render();
        $this->assertEqualsHtml($expected, $rendered);
    }

    public function testRenderWithTitle(): void
    {
        $audio =
            Audio::create()
                ->withURL('http://foo.com/mp3')
                ->withTitle('audio title');

        $expected =
            '<audio title="audio title">'.
                '<source src="http://foo.com/mp3"/>'.
            '</audio>';

        $rendered = $audio->render();
        $this->assertEqualsHtml($expected, $rendered);
    }

    public function testRenderWithAutoplay(): void
    {
        $audio =
            Audio::create()
                ->withURL('http://foo.com/mp3')
                ->enableAutoplay();

        $expected =
            '<audio autoplay="autoplay">'.
                '<source src="http://foo.com/mp3"/>'.
            '</audio>';

        $rendered = $audio->render();
        $this->assertEqualsHtml($expected, $rendered);
    }

    public function testRenderWithMuted(): void
    {
        $audio =
            Audio::create()
                ->withURL('http://foo.com/mp3')
                ->enableMuted();

        $expected =
            '<audio muted="muted">'.
                '<source src="http://foo.com/mp3"/>'.
            '</audio>';

        $rendered = $audio->render();
        $this->assertEqualsHtml($expected, $rendered);
    }

    public function testRenderWithTitleAndAutoplayMuted(): void
    {
        $audio =
            Audio::create()
                ->withURL('http://foo.com/mp3')
                ->withTitle('audio title')
                ->enableMuted()
                ->enableAutoplay();

        $expected =
            '<audio title="audio title" autoplay="autoplay" muted="muted">'.
                '<source src="http://foo.com/mp3"/>'.
            '</audio>';

        $rendered = $audio->render();
        $this->assertEqualsHtml($expected, $rendered);
    }
}
