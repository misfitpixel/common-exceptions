<?php

namespace MisfitPixel\Common\Exception;


use MisfitPixel\Common\Exception\Abstraction\BaseException;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class UnauthorizedException
 * @package MisfitPixel\Common\Exception
 */
class UnauthorizedException extends BaseException
{
    /** @var int  */
    protected int $statusCode = Response::HTTP_UNAUTHORIZED;

    /** @var string  */
    protected $message = 'Unauthorized';

    /**
     * @return array
     */
    public function getData(): array
    {
        return [];
    }
}
