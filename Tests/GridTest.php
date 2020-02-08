<?php
/**
 * @author PhpTheme Dev Team <dev@getphptheme.com>
 * @license MIT
 * @link http://getphptheme.com
 */
namespace PhpTheme\Grid\Tests;

use PhpTheme\Grid\Grid;
use PhpTheme\Grid\GridHeader;

class GridTest extends \PHPUnit\Framework\TestCase
{

    public function testIndex()
    {
        $grid = new Grid([
            'defaultAttributes' => [
                'class' => 'class_1'
            ],
            'attributes' => [
                'class' => ['class_2']
            ],
            'headers' => [
                'header_1',
                ['content' => 'header_2'],
                new GridHeader(['content' => 'header_3'], new Grid)
            ]
        ]);

        $content = $grid->toString();

        $this->assertEquals($content, '<table class="class_1 class_2">'
                . '<tr><th>header_1</th><th>header_2</th><th>header_3</th></tr>'
            .'</table>');
    }

}