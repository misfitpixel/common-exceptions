<?php

namespace MisfitPixel\Common\Exception;

/**
 * Class OauthAuthorizationException
 * @package MisfitPixel\Common\Exception
 */
class OauthAuthorizationException extends BadRequestException
{
    /** @var string|null  */
    private ?string $hint;

    /**
     * @param string|null $message
     * @param string|null $hint
     * @param \Exception|null $previous
     * @param array $headers
     * @param int|null $code
     */
    public function __construct(string $message = null, ?string $hint = null, \Exception $previous = null, array $headers = array(), ?int $code = 0)
    {
        $this->hint = $hint;
        parent::__construct($message, $previous, $headers, $code);
    }

    /**
     * @return string[]
     */
    public function getData(): array
    {
        return [
            'hint' => $this->hint
        ];
    }
}
