<?php
/**
 * @author PhpTheme Dev Team <dev@getphptheme.com>
 * @license MIT
 * @link http://getphptheme.com
 */
namespace PhpTheme\Grid\Tests;

use PhpTheme\Grid\GridHeader;
use PhpTheme\Grid\Grid;

class GridHeaderTest extends \PHPUnit\Framework\TestCase
{

    public function testIndex()
    {
        $grid = new Grid;

        $header = new GridHeader([
            'content' => 'content',
            'defaultAttributes' => [
                'class' => 'class_1'
            ],
            'attributes' => [
                'class' => ['class_2']
            ]

        ], $grid);

        $content = $header->toString();

        $this->assertEquals($content, '<th class="class_1 class_2">content</th>');
    }

}