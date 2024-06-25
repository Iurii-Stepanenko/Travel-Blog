<?php

declare(strict_types=1);

namespace Iuriis\Framework\Http\Response;

class Raw
{
    /**
     * @var array
     */
    private array $headers = [];

    /**
     * @var string
     */
    private string $body = '';

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param string $headers
     * @return void
     */
    public function setHeaders(string $headers): void
    {
        $this->headers[] = $headers;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $body
     * @return $this
     */
    public function setBody(string $body): Raw
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @return void
     */
    public function send(): void
    {
        foreach ($this->getHeaders() as $header)
        {
            header($header);
        }

        echo $this->getBody();
    }
}