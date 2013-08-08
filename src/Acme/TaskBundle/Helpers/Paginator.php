<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Volodya
 * Date: 07.08.13
 * Time: 14:09
 * To change this template use File | Settings | File Templates.
 */

namespace Acme\TaskBundle\Helpers;


class Paginator {

    private $_items;

    private $_paginator;

    private $_query;

    private $_itemCount;

    private $_url;

    private $_maxItems;

    private $_maxPages;

    private $_currPage;

    public function __construct($query, $itemCount, $url, $currPage = 1, $maxItems = 10, $maxPages = 20)
    {
        $this->_query = $query;
        $this->_itemCount = $itemCount;
        $this->_url = $url;
        $this->_currPage = $currPage;
        $this->_maxItems = $maxItems;
        $this->_maxPages = $maxPages;

        $this->paginate();
    }

    private function paginate()
    {
        $this->_query->setMaxResults($this->_maxItems)
            ->setFirstResult(($this->_currPage - 1) * $this->_maxItems);
        $this->_items = $this->_query->getResult();

        $this->_paginator = array();
        $page_count = ceil($this->_itemCount / $this->_maxItems);
        $lft = (($this->_currPage - (($this->_maxPages - 1) / 2)) > 0) ?
            ($this->_currPage - (($this->_maxPages - 1) / 2)) : 1;
        $rgt = (($this->_currPage + (($this->_maxPages - 1) / 2)) < $page_count) ?
            ($this->_currPage + (($this->_maxPages - 1) / 2)) : $page_count;
        if($lft > 1)
            $this->_paginator[1] = 1;
        if($lft > 2)
            $this->_paginator['leftPoints'] = '...';
        for($i = $lft; $i <= $rgt; $i++) {
            $this->_paginator[$i] = $i;
        }
        if($rgt < $page_count - 1)
            $this->_paginator['rightPoints'] = '...';
        if($rgt < $page_count)
            $this->_paginator[(int) $page_count] = (int) $page_count;

    }

    public function getItems()
    {
        return $this->_items;
    }

    public function __toString()
    {
        $result = '';
        $result .= "Страницы: ";
        foreach($this->_paginator as $page => $value )
        {
            if(is_integer($value) and $value != $this->_currPage)
            {
                if($value != 1)
                    $result .= "{$page}";
                else
                    $result .= "1";
            }
            elseif($value != $this->_currPage)
                $result .= "{$value}";
            else
                $result .= "{$value}";
        }

        return $result;
    }

}