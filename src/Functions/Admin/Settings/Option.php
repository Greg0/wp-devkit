<?php


namespace Plugin\DevKit\Functions\Admin\Settings;

use Plugin\DevKit\Annotations\Definition\AddAction;

/**
 * @AddAction(id=GlobalActions::ADMIN_INIT)
 */
class Option
{
    /** @var string */
    private $optionName;
    /** @var mixed */
    private $optionValue;

    public function __construct(
        string $optionName,
        $optionValue
    ) {
        $this->optionName  = $optionName;
        $this->optionValue = $optionValue;
    }

    public function __invoke()
    {
        add_option(
            $this->optionName,
            $this->optionValue
        );
    }

    /**
     * @return mixed
     */
    public static function get(string $optionName)
    {
        return get_option($optionName);
    }
}
