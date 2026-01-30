<nav>
<?php
$entries = [
    ['label' => 'Home', 'url' => '/phpractice/day2/'],
    ['label' => 'Iscriviti', 'url' => '/phpractice/day2/register']
];
foreach ($entries as $entry) {
    echo "<a href=\"{$entry['url']}\">{$entry['label']}</a> ";
}
?>
</nav>