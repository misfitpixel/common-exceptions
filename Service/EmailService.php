<?php

namespace MisfitPixel\Common\Service;

use Google\Cloud\PubSub\PubSubClient;
use Google\Cloud\PubSub\Topic;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class EmailService
 * @package MisfitPixel\Common\Service
 */
class EmailService
{
    /** @var PubSubClient  */
    private PubSubClient $pubSubClient;
    /** @var Topic  */
    private Topic $topic;

    public function __construct(ContainerInterface $container)
    {
        /**
         * TODO: handle init failing.
         */
        $this->pubSubClient = new PubSubClient([
            'keyFilePath' => $container->getParameter('google')['google_application_credentials']
        ]);

        $this->topic = $this->pubSubClient->topic('email');
    }

    /**
     * @param string $to
     * @param string $from
     * @param string $bounced
     * @param string $subject
     * @param string $content
     * @param string|null $textContent
     * @param string|null $template
     * @return array
     */
    public function send(string $to, string $from, string $bounced, string $subject, string $content, string $textContent = null, string $template = null): array
    {
        return $this->topic->publish([
            'data' => $content,
            'attributes' => [
                'to' => $to,
                'from' => $from,
                'bounced' => $bounced,
                'subject' => $subject,
                'text-content' => $textContent,
                'template' => $template
            ]
        ]);
    }
}
