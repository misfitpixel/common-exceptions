<?php

namespace MisfitPixel\Common\Exception;


use MisfitPixel\Common\Exception\Abstraction\BaseException;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class RequestConflictException
 * @package MisfitPixel\Common\Exception
 */
class RequestConflictException extends BaseException
{
    /** @var int  */
    protected int $statusCode = Response::HTTP_CONFLICT;

    /** @var string  */
    protected $message = 'Conflict';

    /**
     * @return array
     */
    public function getData(): array
    {
        return [];
    }
}
