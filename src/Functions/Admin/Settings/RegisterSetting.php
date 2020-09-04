<?php


namespace Plugin\DevKit\Functions\Admin\Settings;

use Plugin\DevKit\Common\Action\GlobalActions;
use Plugin\DevKit\Annotations\Definition\AddAction;

/**
 * @AddAction(id=GlobalActions::ADMIN_INIT)
 */
class RegisterSetting
{
    /** @var string */
    private $optionGroup;
    /** @var string */
    private $optionName;
    /** @var callable */
    private $sanitizeCallback;

    public function __construct(string $optionGroup, string $optionName, callable $sanitizeCallback)
    {
        $this->optionGroup      = $optionGroup;
        $this->optionName       = $optionName;
        $this->sanitizeCallback = $sanitizeCallback;
    }

    public function __invoke()
    {
        register_setting(
            $this->optionGroup,
            $this->optionName,
            $this->sanitizeCallback
        );
    }
}
