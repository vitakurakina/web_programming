<?php
echo "PHP Version: " . phpversion() . "<br>";

if (extension_loaded('gd')) {
    echo "✅ GD расширение загружено<br>";
    
    $gd_info = gd_info();
    echo "<pre>";
    print_r($gd_info);
    echo "</pre>";
    
    echo "Поддерживаемые форматы:<br>";
    echo "JPEG: " . (isset($gd_info['JPEG Support']) && $gd_info['JPEG Support'] ? '✅' : '❌') . "<br>";
    echo "PNG: " . (isset($gd_info['PNG Support']) && $gd_info['PNG Support'] ? '✅' : '❌') . "<br>";
} else {
    echo "❌ GD расширение НЕ загружено<br>";
}
?>