<?php

declare(strict_types=1);

namespace Amateri\PropertyReader\VariableType;

/**
 * @property-read string $class FQN class name
 */
final class ClassVariableType extends AbstractVariableType
{
    protected string $class;

    public function __construct(string $class, bool $nullable)
    {
        $this->class = $class;
        parent::__construct($nullable);
    }

    public function getClass(): string
    {
        return $this->class;
    }

    public function validate(): void
    {
        parent::validate();
        if (!class_exists($this->class)) {
            throw new \Exception("Unknown class");
        }
    }
}
