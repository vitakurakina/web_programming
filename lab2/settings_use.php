<?php
spl_autoload_register();

use Singleton\Settings;

Settings::get()->items_per_page = 20;
Settings::get()->site_name = "My Website";
Settings::get()->is_dark_mode = true;

echo Settings::get()->items_per_page . "<br>";
echo Settings::get()->site_name . "<br>";
echo (Settings::get()->is_dark_mode ? 'true' : 'false') . "<br>";
