<?php

/**
 * Create storage symlink for shared hosting
 * Access this file once via browser: https://yourdomain.com/create-storage-link.php
 * Then DELETE this file for security!
 */

$targetFolder = $_SERVER['DOCUMENT_ROOT'] . '/../storage/app/public';
$linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/storage';

// For some hosts, the structure might be different
// Try alternative paths if the above doesn't work
$altTargetFolder = dirname($_SERVER['DOCUMENT_ROOT']) . '/storage/app/public';

if (!file_exists($targetFolder)) {
    $targetFolder = $altTargetFolder;
}

echo "<h2>Storage Link Creator</h2>";
echo "<p><strong>Target folder:</strong> $targetFolder</p>";
echo "<p><strong>Link folder:</strong> $linkFolder</p>";

if (file_exists($linkFolder)) {
    echo "<p style='color: orange;'>⚠️ Link/folder already exists at: $linkFolder</p>";
    
    if (is_link($linkFolder)) {
        echo "<p style='color: green;'>✅ It's already a symlink pointing to: " . readlink($linkFolder) . "</p>";
    } else {
        echo "<p style='color: red;'>❌ It's a regular folder, not a symlink. You may need to delete it first.</p>";
    }
} else {
    if (file_exists($targetFolder)) {
        // Try to create symlink
        if (symlink($targetFolder, $linkFolder)) {
            echo "<p style='color: green;'>✅ SUCCESS! Storage link created successfully!</p>";
        } else {
            echo "<p style='color: red;'>❌ Failed to create symlink. Your hosting may not support symlinks.</p>";
            echo "<p>Alternative: Copy files from <code>storage/app/public</code> to <code>public/storage</code> manually.</p>";
        }
    } else {
        echo "<p style='color: red;'>❌ Target folder doesn't exist: $targetFolder</p>";
        echo "<p>Make sure you uploaded the entire project including the storage folder.</p>";
    }
}

echo "<hr>";
echo "<p style='color: red;'><strong>⚠️ IMPORTANT:</strong> Delete this file after use for security!</p>";
