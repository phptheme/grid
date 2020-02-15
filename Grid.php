<?php
/**
 * @author PhpTheme Dev Team <dev@getphptheme.com>
 * @license MIT
 * @link http://getphptheme.com
 */
namespace PhpTheme\Grid;

use Closure;
use PhpTheme\HtmlHelper\HtmlHelper;

class Grid extends \PhpTheme\Widget\Widget
{

    const GRID_CELL = GridCell::class;

    const GRID_HEADER = GridHeader::class;

    protected $_items;

    protected $_headers;

    public $tag = 'table';

    public $attributes = [];

    public $items = [];

    public $headers = [];

    public $headersTemplate = '<tr>{headers}</tr>';

    public $itemTemplate = '<tr>{item}</tr>';

    public function getItems()
    {
        if ($this->_items !== null)
        {
            return $this->_items;
        }

        $this->_items = [];

        if ($this->items instanceof Closure)
        {
            $items = $this->items;

            $items = $items->bindTo($this);

            $items = $items();
        }
        else
        {
            $items = $this->items;
        }

        foreach($items as $key => $columns)
        {
            $this->_items[$key] = $columns;

            foreach($this->_items[$key] as $k => $v)
            {
                if (!is_object($v))
                {
                    if (!is_array($v))
                    {
                        $v = ['content' => $v];
                    }

                    $v = $this->createCell($v);
                }

                $this->_items[$key][$k] = $v;
            }
        }

        return $this->_items;
    }

    public function renderItems()
    {
        $content = '';

        $headers = $this->getHeaders();

        foreach($this->getItems() as $cells)
        {
            $item = '';

            foreach($cells as $key => $cell)
            {
                $attributes = $cell->attributes;

                if (array_key_exists($key, $headers))
                {
                    $header = $headers[$key];

                    if ($header->cellAttributes)
                    {
                        $cell->attributes = HtmlHelper::mergeAttributes($cell->attributes, $header->cellAttributes);
                    }
                }

                $item .= $cell->toString();

                $cell->attributes = $attributes;
            }

            $content .= strtr($this->itemTemplate, ['{item}' => $item]);
        }

        return $content;
    }

    public function renderHeaders()
    {
        $content = '';

        foreach($this->getHeaders() as $column)
        {
            $content .= $column->toString();
        }

        return strtr($this->headersTemplate, ['{headers}' => $content]);
    }

    public function getHeaders()
    {
        if ($this->_headers !== null)
        {
            return $this->_headers;
        }

        $this->_headers = [];

        foreach($this->headers as $key => $header)
        {
            if (!is_object($header))
            {
                if (!is_array($header))
                {
                    $header = ['content' => $header];
                }

                $header = $this->createHeader($header);
            }

            $this->_headers[$key] = $header;
        }

        return $this->_headers;
    }

    public function getContent() : string
    {
        $content = $this->renderItems();

        return $this->renderHeaders() . $content;
    }

    public function createCell(array $params = [])
    {
        $class = $params['class'] ?? static::GRID_CELL;

        return new $class($params);
    }

    public function createHeader(array $params = [])
    {
        $class = $params['class'] ?? static::GRID_HEADER;

        return new $class($params);
    }

}