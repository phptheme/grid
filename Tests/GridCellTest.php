<?php
/**
 * @author PhpTheme Dev Team <dev@getphptheme.com>
 * @license MIT
 * @link http://getphptheme.com
 */
namespace PhpTheme\Grid\Tests;

use PhpTheme\Grid\GridCell;
use PhpTheme\Grid\Grid;

class GridCellTest extends \PHPUnit\Framework\TestCase
{

    public function testIndex()
    {
        $grid = new Grid;

        $cell = new GridCell([
            'content' => 'content',
            'defaultAttributes' => [
                'class' => 'class_1'
            ],
            'attributes' => [
                'class' => ['class_2']
            ]

        ], $grid);

        $content = $cell->toString();

        $this->assertEquals($content, '<td class="class_1 class_2">content</td>');
    }

}