<?php
namespace Plugin\DevKit\Common\Action;


interface GlobalActions
{
    public const PLUGINS_LOADED = 'plugins_loaded';
    public const CONTENT = 'the_content';
    public const GLOBAL_INIT = 'init';
    public const ADMIN_MENU = 'admin_menu';
    public const ADMIN_INIT = 'admin_init';
    public const ADD_META_BOX = 'add_meta_boxes';
}
