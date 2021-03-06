<?php
/**
 * @author PhpTheme Dev Team <dev@getphptheme.com>
 * @license MIT
 * @link http://getphptheme.com
 */
namespace PhpTheme\Grid;

class GridHeader extends \PhpTheme\Widget\Widget
{

    const GRID_CELL = GridCell::class;

    protected $_grid;

    public $tag = 'th';

    public $defaultCellAttributes = [];

    public $cellAttributes = [];

    public function __construct(array $params = [], Grid $grid = null)
    {
        parent::__construct($params);

        $this->_grid = $grid;
    }

    public function getGrid()
    {
        return $this->_grid;
    }

    public function getCellAttributes() : array
    {
        return $this->cellAttributes;
    }

    public function getDefaultCellAttributes() : array
    {
        return $this->defaultCellAttributes;
    }

}