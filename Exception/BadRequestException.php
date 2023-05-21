<?php

namespace MisfitPixel\Common\Exception;


use MisfitPixel\Common\Exception\Abstraction\BaseException;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class BadRequestException
 * @package MisfitPixel\Common\Exception
 */
class BadRequestException extends BaseException
{
    /** @var int  */
    protected int $statusCode = Response::HTTP_BAD_REQUEST;

    /** @var string  */
    protected $message = 'Bad request';

    /**
     * @return array
     */
    public function getData(): array
    {
        return [];
    }
}
