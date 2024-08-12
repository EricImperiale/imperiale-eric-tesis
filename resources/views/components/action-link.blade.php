<?php
switch ($action) {
    case 'edit':
        $routeName = $model . '.editForm';
        break;

    case 'delete':
        $routeName = $model . '.deleteForm';
        break;
    default:
        $routeName = '#';
        break;
}

$href = $routeName === '#' ? '#' : route($routeName, $modelId);
?>
<a
    href="{{ $href }}"
    class="{{ $class }}">
    {{ $slot }}
</a>
