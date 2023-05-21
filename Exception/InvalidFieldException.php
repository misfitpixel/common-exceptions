<?php

namespace MisfitPixel\Common\Exception;


use MisfitPixel\Common\Exception\Abstraction\BaseException;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class InvalidFieldException
 * @package MisfitPixel\Common\Exception
 */
class InvalidFieldException extends BaseException
{
    /** @var int */
    protected int $statusCode = Response::HTTP_BAD_REQUEST;

    /** @var string */
    protected $message = 'Bad Request';

    /** @var string|null  */
    protected ?String $field;

    /**
     * @param string|null $message
     * @param string|null $field
     * @param \Exception|null $previous
     * @param array $headers
     * @param int|null $code
     */
    public function __construct(?string $message = null, ?string $field = null, ?\Exception $previous = null, array $headers = array(), ?int $code = 0)
    {
        $this->field = $field;

        parent::__construct($message, $previous, $headers, $code);
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return [
            'field' => $this->field
        ];
    }
}
