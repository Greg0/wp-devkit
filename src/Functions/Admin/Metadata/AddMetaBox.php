<?php


namespace Plugin\DevKit\Functions\Admin\Metadata;

use Plugin\DevKit\Annotations\Definition\AddAction;
use Plugin\DevKit\Common\Action\GlobalActions;

/**
 * @AddAction(id=GlobalActions::ADD_META_BOX)
 */
class AddMetaBox
{
    private $id;
    private $title;
    private $callback;
    private $postType;

    public function __construct(
        string $id,
        string $title,
        callable $callback,
        string $postType = 'post'
    )
    {
        $this->id       = $id;
        $this->title    = $title;
        $this->callback = $callback;
        $this->postType = $postType;
    }


    public function __invoke()
    {
        add_meta_box(
            $this->id,
            $this->title,
            $this->callback,
            $this->postType
        );
    }
}
