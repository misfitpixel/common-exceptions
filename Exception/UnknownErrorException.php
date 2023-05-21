<?php

namespace MisfitPixel\Common\Exception;


use MisfitPixel\Common\Exception\Abstraction\BaseException;

/**
 * Class UnknownErrorException
 * @package MisfitPixel\Common\Exception
 */
class UnknownErrorException extends BaseException
{
    /**
     * @return array
     */
    public function getData(): array
    {
        return [];
    }
}
