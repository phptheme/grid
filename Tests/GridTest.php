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
                [
                    'content' => 'header_2',
                    'cellAttributes' => [
                        'class' => 'd-none d-md-table-cell'
                    ],
                    'attributes' => [
                        'class' => 'd-none d-md-table-cell'
                    ]
                ],
                new GridHeader(['content' => 'header_3'], new Grid)
            ],
            'items' => function() {
                yield [
                    'col_1_1', 
                    'col_1_2', 
                    'col_1_3'
                ];
                yield [
                    'col_2_1', 
                    'col_2_2', 
                    'col_2_3'
                ];
            }
        ]);

        $content = $grid->toString();

        $this->assertEquals($content, '<table class="class_1 class_2">'
            . '<thead>'
            . '<tr>'
                . '<th>header_1</th>'
                . '<th class="d-none d-md-table-cell">header_2</th>'
                . '<th>header_3</th>'
            . '</tr>'
            . '</thead>' 
            . '<tbody>'
            . '<tr>'
                . '<td>col_1_1</td>'
                . '<td class="d-none d-md-table-cell">col_1_2</td>'
                . '<td>col_1_3</td>'
            . '</tr>'
            . '<tr>'
                . '<td>col_2_1</td>'
                . '<td class="d-none d-md-table-cell">col_2_2</td>'
                . '<td>col_2_3</td>'
            . '</tr>'
            . '</tbody>'
        . '</table>');
    }

}