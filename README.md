# common-exceptions
Exception handler and shared exceptions for misfitpixel PHP projects based on the [Symfony](https://symfony.com/) framework.

### Creating Exceptions

Custom exceptions should extend from _MisfitPixel\Common\Exception\Abstraction\BaseException_.

Each of these exceptions are based on the Symfony native HTTPException, and allow storing of an error message and an
HTTP status code.

The exception handler must be enabled manually as a service in _config/services.yaml_:
```yaml
# This file is the entry point to configure your own services.
# Files in the packages/ subdirectory configure your dependencies.

# Put parameters here that don't need to change on each machine where the app is deployed
# https://symfony.com/doc/current/best_practices/configuration.html#application-related-configuration
parameters:
    ...
services:
...
  # EXCEPTIONS
  MisfitPixel\Common\Exception\Controller\ExceptionController:
    tags:
      - { name: kernel.event_listener, event: kernel.exception }
    arguments:
      $debug: '%kernel.debug%'
...
```

Whenever an exception is incurred, logic is passed through our event controller. If the consumed exception is of type _MisfitPixel\Common\Exception\Abstraction\BaseException_ then it will be processed as a standardized JSON block, or as a custom HTML template.  Otherwise, exception handling is deferred to the native Symfony handler.

Each custom controller should have at least two of a possible three protected attributes initialized with default
values:

* statusCode: the default HTTP status code to be sent with the response.
* message: the default error message to be sent with the response.
* template (optional): to be included if the exception should be rendered with an HTML template instead of as JSON.

Additionally, each custom exception must implement a getData() method, which is used to return extra data to the
if needed.

We can use our InvalidFieldException as an example, which returns an HTTP 400 and keeps track of an API request field
that failed some kind of validation.

```php
...

    /** @var int */
    protected $statusCode = Response::HTTP_BAD_REQUEST; // Status Code 400

    /** @var string */
    protected $message = 'Bad Request';

    /** @var string */
    protected $field;

    /**
     * InvalidFieldException constructor.
     * @param null|string $message
     * @param null|string $field
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

...
```
This example sets the default HTTP status code to 400 (Bad Request), and the error message to the same string.

Additionally, this exception keeps track of a particular field, and returns that field as part of the getData() method.

The status code and message can be overridden at any time whenever the exception is invoked as part of the constructor.
