<?php


namespace Plugin\DevKit\Functions\Admin\Settings;

use Plugin\DevKit\Common\Action\GlobalActions;
use Plugin\DevKit\Annotations\Definition\AddAction;

/**
 * @AddAction(id=GlobalActions::ADMIN_INIT)
 */
class AddSettingsSection
{
    /** @var string */
    private $id;
    /** @var string */
    private $title;
    /** @var callable */
    private $callback;
    /** @var string */
    private $page;

    public function __construct(string $id, string $title, string $page, callable $callback)
    {
        $this->id       = $id;
        $this->title    = $title;
        $this->callback = $callback;
        $this->page     = $page;
    }


    public function __invoke()
    {
        add_settings_section(
            $this->id,
            $this->title,
            $this->callback,
            $this->page
        );
    }
}
