Wordpress DevKit plugin
=======================

Plugin adds modern programming techniques.

Plugin add support for:
- [Dependency Injection Container](https://php-di.org/)
- [ORM](https://www.doctrine-project.org) with multisite support
- Actions and filters moved to separated classes and methods by [Annotations](https://github.com/doctrine/annotations/)
    ```php
    /**
     * @AddFilter(id="the_content")
     */
    class Replace
    {
        private $search;
        private $replacement;
    
        public function __construct(array $search, array $replacement)
        {
            Assert::allString($search);
            Assert::allString($replacement);
            $this->search      = $search;
            $this->replacement = $replacement;
        }
    
        public function __invoke(string $content)
        {
            return str_replace($this->search, $this->replacement, $content);
        }
    }
    ```
      
    ```php
    $ann = new \Plugin\DevKit\Annotations\AnnotationHandler();
    $ann->register(
        new Hook\ContentModifier\Replace(['post'], ['great post']),
    );
    ```

How to use?
-----------

First of all your plugin activation hook should check for devkit activation, e.g.:
```php
if (is_plugin_active('wp-devkit/wp-devkit.php') === false) {
    die(__('Plugin depends on "DevKit Plugin". Please activate it first.'));
}
```

### DI Container

Then in your plugin just use

```php
add_action('plugins_loaded', function () {
    $ann = new \Plugin\DevKit\Annotations\AnnotationHandler();
    $ann->register(
        new \Plugin\DevKit\Container\Action\AddDefinitions(
            __DIR__ . '/config/definitions.php',
            __DIR__ . '/config/decorators.php'
        ),
    );
})
```

### ORM entities

Like before in `plugins_loaded` action handle annotation, with XML mappings:
```php
new \Plugin\DevKit\ORM\Action\AddOrmMapping([
    __DIR__ . '/config/entity' => 'Plugin\TestPlugin\Entity' // our entities
]);
```



