<?php

namespace MisfitPixel\Common\Exception;


use MisfitPixel\Common\Exception\Abstraction\BaseException;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ForbiddenException
 * @package MisfitPixel\Common\Exception
 */
class ForbiddenException extends BaseException
{
    /** @var int  */
    protected int $statusCode = Response::HTTP_FORBIDDEN;

    /** @var string  */
    protected $message = 'Forbidden';

    /**
     * @return array
     */
    public function getData(): array
    {
        return [];
    }
}
