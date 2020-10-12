<?php


namespace Plugin\DevKit\Functions\PostType;

use Plugin\DevKit\Annotations\Definition\AddAction;
use Plugin\DevKit\Common\Action\GlobalActions;

/**
 * @AddAction(id=GlobalActions::GLOBAL_INIT)
 */
class RegisterPostType
{
    private $postType;
    private $args;

    public function __construct(string $postType, array $args = [])
    {
        $this->postType = $postType;
        $this->args     = $args;
    }

    public function __invoke()
    {
        register_post_type(
            $this->postType,
            $this->args
        );
    }


}
