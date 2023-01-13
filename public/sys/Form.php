<?php
    class Form
    {
        static function input(string $type, string $class, string $placeHolder = null, string $name, int $maxLength = null, $title = null) : string
        {
            return <<<HTML
                <input type="{$type}" class="{$class}" placeholder="{$placeHolder}" name="{$name}", maxlength="{$maxLength}, title="{$title}">
HTML;
        }
    }
?>
<!-- , string $value -->