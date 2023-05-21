<?php

namespace MisfitPixel\Common\Exception;


use MisfitPixel\Common\Exception\Abstraction\BaseException;

/**
 * Class DbException
 * @package MisfitPixel\Common\Exception
 */
class DbException extends BaseException
{
    /**
     * @return array
     */
    public function getData(): array
    {
        return [];
    }
}
