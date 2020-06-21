<?php
namespace Plugin\DevKit\Annotations\Definition;

use Doctrine\Common\Annotations\Annotation\Required;
use Doctrine\Common\Annotations\Annotation\Target;

/**
 * @Annotation
 * @Target({"METHOD","CLASS"})
 */
final class AddAction implements CallableAnnotation
{
    /**
     * @Required()
     * @var string
     */
    public $id;

    public function call(callable $callable): void
    {
        add_action($this->id, $callable);
    }
}
