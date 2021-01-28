<?php

declare(strict_types=1);

namespace Silarhi\Cfonb\Banking;

use Silarhi\Cfonb\Exceptions\ParseException;

use function sprintf;

class StatementCollection
{
    /** @var Operation|null */
    private $lastOperation;
    /** @var Statement */
    private $current;
    /** @var Statement[] */
    private $list = [];

    public function __construct()
    {
        $this->current = new Statement();
    }

    /** @return void */
    public function addBalance(Balance $balance)
    {
        $this->lastOperation = null;

        if ($this->current->hasOldBalance() === false) {
            $this->current->setOldBalance($balance);
        } else {
            $this->current->setNewBalance($balance);
            $this->list[]  = $this->current;
            $this->current = new Statement();
        }
    }

    /** @return void */
    public function addOperation(Operation $operation)
    {
        $this->lastOperation = $operation;
        $this->current->addOperation($operation);
    }

    /** @return void */
    public function addOperationDetail(OperationDetail $operationDetail)
    {
        if ($this->lastOperation === null) {
            throw new ParseException(sprintf('Unable to attach a detail for operation with internal code %s', $operationDetail->getInternalCode()));
        }

        $this->lastOperation->addDetails($operationDetail);
    }

    /** @return Statement[] */
    public function toArray(): array
    {
        return $this->list;
    }
}
