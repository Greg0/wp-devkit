<?php


namespace Plugin\DevKit\Functions\Admin\Settings;

use Plugin\DevKit\Common\Action\GlobalActions;
use Plugin\DevKit\Annotations\Definition\AddAction;

/**
 * @AddAction(id=GlobalActions::ADMIN_INIT)
 */
class AddSettingsField
{
    /** @var string */
    private $id;
    /** @var string */
    private $title;
    /** @var callable */
    private $callback;
    /** @var string */
    private $page;
    /** @var string */
    private $section;
    /** @var array */
    private $args = [];

    public function __construct(
        string $id,
        string $title,
        callable $callback,
        string $page,
        string $section = 'default',
        array $args = []
    ) {
        $this->id       = $id;
        $this->title    = $title;
        $this->callback = $callback;
        $this->page     = $page;
        $this->section  = $section;
        $this->args     = $args;
    }


    public function __invoke()
    {
        add_settings_field(
            $this->id,
            $this->title,
            $this->callback,
            $this->page,
            $this->section,
            $this->args
        );
    }
}
