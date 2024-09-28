<?php

declare(strict_types=1);

namespace Iuriis\Install\Controller;

class Index implements \Iuriis\Framework\Http\ControllerInterface
{
    /**
     * @var \Iuriis\Framework\Database\Adapter\AdapterInterface $adapter
     */
    private \Iuriis\Framework\Database\Adapter\AdapterInterface $adapter;

    /**
     * @var \Iuriis\Framework\Http\Response\Html $html
     */
    private \Iuriis\Framework\Http\Response\Html $html;

    /**
     * @param \Iuriis\Framework\Database\Adapter\AdapterInterface $adapter
     * @param \Iuriis\Framework\Http\Response\Html $html
     */
    public function __construct(
        \Iuriis\Framework\Database\Adapter\AdapterInterface $adapter,
        \Iuriis\Framework\Http\Response\Html $html
    ) {
        $this->adapter = $adapter;
        $this->html = $html;
    }

    /**
     * @return \Iuriis\Framework\Http\Response\Html
     */
    public function execute(): \Iuriis\Framework\Http\Response\Html
    {
        $output = '';

        try {
            $connection = $this->adapter->getConnection();
            $output .= 'Successful DB connection!<br/>';
            // Convention: comment `#---` is a query separator for `schema.sql` file
            $sql = file_get_contents('../config/schema.sql');

            foreach (explode('#---', $sql) as $query) {
                $query = trim($query);
                $output .= sprintf('Executing query: <br/><pre>%s</pre><br/>', htmlspecialchars($query));

                if (!$connection->query($query)) {
                    throw new \RuntimeException('Error executing query!');
                }
            }

            $output .= '<p style="font-size:32px;color:green;">Execution completed!</p>';
        } catch (\Exception $e) {
            $output .= "<p style='font-size:32px;color:red;'>{$e->getMessage()}</p>";
        }

        $this->html->setBody($output);

        return $this->html;
    }
}