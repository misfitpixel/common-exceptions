<?php

namespace MisfitPixel\Common\Exception;


use MisfitPixel\Common\Exception\Abstraction\BaseException;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class TimeoutException
 * @package MisfitPixel\Common\Exception
 */
class TimeoutException extends BaseException
{
    /** @var int  */
    protected int $statusCode = Response::HTTP_REQUEST_TIMEOUT;

    /** @var string  */
    protected $message = "Request Timeout";

    /**
     * @return array
     */
    public function getData(): array
    {
        return [];
    }
}
