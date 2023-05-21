<?php

namespace MisfitPixel\Common\Exception;


use MisfitPixel\Common\Exception\Abstraction\BaseException;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class EntityNotFoundException
 * @package MisfitPixel\Common\Exception
 */
class EntityNotFoundException extends BaseException
{
    /** @var int  */
    protected int $statusCode = Response::HTTP_NOT_FOUND;

    /** @var string  */
    protected $message = "Entity not found";

    /** @var string|null  */
    protected ?string $entityName;

    /**
     * @param string|null $message
     * @param $entityName
     * @param \Exception|null $previous
     * @param array $headers
     * @param int|null $code
     */
    public function __construct(?string $message = null, $entityName = null, ?\Exception $previous = null, array $headers = array(), ?int $code = 0)
    {
        $this->entityName = strtolower(str_replace('App\Entity\\', '', $entityName));

        if($this->entityName != null) {
            $this->message = sprintf('%s not found', ucfirst($this->entityName));
        }

        parent::__construct($message, $previous, $headers, $code);
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return [
            'entity' => $this->entityName
        ];
    }
}
