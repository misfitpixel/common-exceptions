<?php

namespace MisfitPixel\Common\Exception;

/**
 * Class MissingScopesException
 * @package MisfitPixel\Common\Exception
 */
class MissingScopesException extends ForbiddenException
{
    /** @var string  */
    protected $message = 'You do not have all the necessary permissions to access this resource';

    /** @var array  */
    private array $missingScopes = [];

    /**
     * @param array $missingScopes
     * @param \Exception|null $previous
     * @param array $headers
     * @param int|null $code
     */
    public function __construct(array $missingScopes = [], \Exception $previous = null, array $headers = array(), ?int $code = 0)
    {
        $this->missingScopes = $missingScopes;
        parent::__construct($this->message, $previous, $headers, $code);
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->missingScopes;
    }
}
