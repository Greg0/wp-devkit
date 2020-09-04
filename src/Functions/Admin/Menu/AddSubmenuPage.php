<?php


namespace Plugin\DevKit\Functions\Admin\Menu;

use Plugin\DevKit\Annotations\Definition\AddAction;
use Plugin\DevKit\Common\Action\GlobalActions;

/**
 * @AddAction(id=GlobalActions::ADMIN_MENU)
 */
class AddSubmenuPage
{
    /** @var string */
    private $parentSlug;
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
    /** @var int|null */
    private $position;

    public function __construct(
        string $parentSlug,
        string $pageTitle,
        string $menuTitle,
        string $capability,
        string $slug,
        callable $callback,
        ?int $position = null
    ) {
        $this->parentSlug = $parentSlug;
        $this->pageTitle = $pageTitle;
        $this->menuTitle = $menuTitle;
        $this->capability = $capability;
        $this->slug = $slug;
        $this->callback = $callback;
        $this->position = $position;
    }

    public function __invoke()
    {
        add_submenu_page(
            $this->parentSlug,
            $this->pageTitle,
            $this->menuTitle,
            $this->capability,
            $this->slug,
            $this->callback,
            $this->position
        );
    }
}
