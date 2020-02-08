<?php
/**
 * @author PhpTheme Dev Team <dev@getphptheme.com>
 * @license MIT
 * @link http://getphptheme.com
 */
namespace PhpTheme\Grid;

class GridCell extends \PhpTheme\Widget\Widget
{

    protected $_grid;

    public $tag = 'td';

    public function __construct(array $params = [], Grid $grid = null)
    {
        parent::__construct($params);

        $this->_grid = $grid;
    }

    public function getGrid()
    {
        return $this->_grid;
    }    

}