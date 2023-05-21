<?php

namespace MisfitPixel\Common\Exception;


use Symfony\Component\HttpFoundation\Response;

/**
 * Class NonUniqueEntityException
 * @package MisfitPixel\Common\Exception
 */
class NonUniqueEntityException extends EntityNotFoundException
{
    /** @var int */
    protected int $statusCode = Response::HTTP_CONFLICT;

    /** @var string  */
    protected $message = 'This record already exists';

    /**
     * @param string|null $message
     * @param $entity
     * @param \Exception|null $previous
     * @param array $headers
     * @param int|null $code
     */
    public function __construct(?string $message = null, $entity = null, ?\Exception $previous = null, array $headers = array(), ?int $code = 0)
    {
        parent::__construct($message, $entity, $previous, $headers, $code);

        if($this->entityName != null) {
            $this->message = sprintf('This %s already exists', ucfirst($this->entityName));
        }
    }
}
