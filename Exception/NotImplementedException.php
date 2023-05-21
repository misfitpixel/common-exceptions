<?php

namespace MisfitPixel\Common\Exception;


use MisfitPixel\Common\Exception\Abstraction\BaseException;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class NotImplementedException
 * @package MisfitPixel\Common\Exception
 */
class NotImplementedException extends BaseException
{
    /** @var int  */
    protected int $statusCode = Response::HTTP_NOT_IMPLEMENTED;

    /** @var string  */
    protected $message = 'Not implemented';

    /**
     * @return array
     */
    public function getData(): array
    {
        return [];
    }
}
