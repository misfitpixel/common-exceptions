<?php

namespace MisfitPixel\Common\Exception\Abstraction;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * Class BaseException
 * @package MisfitPixel\Common\Exception\Abstraction
 */
abstract class BaseException extends HttpException
{
    /** @var int  */
    protected int $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR;

    /** @var string  */
    protected $message = "An unexpected error occurred.";

    /** @var null|string */
    protected ?string $template = null;

    /**
     * @param string|null $message
     * @param \Exception|null $previous
     * @param array $headers
     * @param int|null $code
     */
    public function __construct(string $message = null, \Exception $previous = null, array $headers = array(), ?int $code = 0)
    {
        if($message === null) {
            $message = $this->message;
        }

        parent::__construct($this->statusCode, $message, $previous, $headers, $code);
    }

    /**
     * @return null|string
     */
    public function getTemplate(): ?string
    {
        return $this->template;
    }

    abstract function getData(): array;
}
