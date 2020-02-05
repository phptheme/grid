<?php

namespace PhpTheme\Grid;

use Closure;

class Grid extends \PhpTheme\Widget\Widget
{

    const GRID_CELL = GridCell::class;

    const GRID_HEADER = GridHeader::class;

    public $tag = 'table';

    public $attributes = [];

    public $items = [];

    public $headers = [];

    public function getItems()
    {
        $items = $this->items;

        if ($items instanceof Closure)
        {
            $items = $items->bindTo($this);

            $items = $items();
        }

        return $items;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function getContent() : string
    {
        return $this->render('grid', [
            'items' => $this->getItems(),
            'headers' => $this->getHeaders()
        ]);
    }

    public function createCell(array $params = [])
    {
        $class = static::GRID_CELL;

        return new $class($params);
    }

    public function createHeader(array $params = [])
    {
        $class = static::GRID_HEADER;

        return new $class($params);
    }

}