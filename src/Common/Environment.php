<?php


namespace Plugin\DevKit\Common;


final class Environment
{
    public function isDev(): bool
    {
        if (defined('WP_DEBUG')) {
            return WP_DEBUG;
        }

        return true;
    }

    public function isProd(): bool
    {
        return $this->isDev() === false;
    }
}
