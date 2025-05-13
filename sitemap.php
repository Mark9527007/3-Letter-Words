<?php
/**
 * 3-Letter Words Dictionary - Sitemap Generator
 * Creates an XML sitemap for search engines
 */

// Set content type to XML
header("Content-Type: application/xml; charset=utf-8");

// Include the words data
require_once 'words_data.php';

// Calculate the base URL
$base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
$path = dirname($_SERVER['PHP_SELF']);
if ($path == '/' || $path == '\\') {
    $base_url .= '/';
} else {
    $base_url .= $path . '/';
}

// Start XML output
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

// Add home page
echo "  <url>\n";
echo "    <loc>" . htmlspecialchars($base_url . "index.php") . "</loc>\n";
echo "    <lastmod>" . date('Y-m-d') . "</lastmod>\n";
echo "    <changefreq>monthly</changefreq>\n";
echo "    <priority>1.0</priority>\n";
echo "  </url>\n";

// Add about page
echo "  <url>\n";
echo "    <loc>" . htmlspecialchars($base_url . "about.php") . "</loc>\n";
echo "    <lastmod>" . date('Y-m-d') . "</lastmod>\n";
echo "    <changefreq>monthly</changefreq>\n";
echo "    <priority>0.8</priority>\n";
echo "  </url>\n";

// Add all word pages
foreach ($threeLetterWords as $word) {
    echo "  <url>\n";
    echo "    <loc>" . htmlspecialchars($base_url . "word.php?word=" . urlencode($word['word'])) . "</loc>\n";
    echo "    <lastmod>" . date('Y-m-d') . "</lastmod>\n";
    echo "    <changefreq>monthly</changefreq>\n";
    echo "    <priority>0.7</priority>\n";
    echo "  </url>\n";
}

// Close the XML
echo '</urlset>';
?>
