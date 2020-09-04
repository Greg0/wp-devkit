<?php


namespace Plugin\DevKit\Functions\Admin\Menu;

use Plugin\DevKit\Annotations\Definition\AddAction;
use Plugin\DevKit\Common\Action\GlobalActions;

/**
 * @AddAction(id=GlobalActions::ADMIN_MENU)
 */
class AddMenuPage
{
    /** @var string */
    private $pageTitle;
    /** @var string */
    private $menuTitle;
    /** @var string */
    private $capability;
    /** @var string */
    private $slug;
    /** @var callable */
    private $callback;
    /** @var string */
    private $icon;
    /** @var int|null */
    private $position;

    public function __construct(
        string $pageTitle,
        string $menuTitle,
        string $capability,
        string $slug,
        callable $callback,
        string $icon = '',
        ?int $position = null
    ) {
        $this->pageTitle = $pageTitle;
        $this->menuTitle = $menuTitle;
        $this->capability = $capability;
        $this->slug = $slug;
        $this->callback = $callback;
        $this->icon = $icon;
        $this->position = $position;
    }

    public function __invoke()
    {
        add_menu_page(
            $this->pageTitle,
            $this->menuTitle,
            $this->capability,
            $this->slug,
            $this->callback,
            $this->icon,
            $this->position
        );
    }
}
