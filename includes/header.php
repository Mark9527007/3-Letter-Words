<?php
/**
 * Header Component
 * Include this file at the top of each page
 */

// Calculate the base URL
$base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
$path = dirname($_SERVER['PHP_SELF']);
if ($path == '/' || $path == '\\') {
    $base_url .= '/';
} else {
    $base_url .= $path . '/';
}

// Get the current page
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php if (isset($page_title)): ?>
        <title><?php echo $page_title; ?> - 3-Letter Words Dictionary</title>
    <?php else: ?>
        <title>3-Letter Words Dictionary - Complete List with Definitions</title>
    <?php endif; ?>

    <?php if (isset($page_description)): ?>
        <meta name="description" content="<?php echo $page_description; ?>">
    <?php else: ?>
        <meta name="description" content="Browse a complete collection of three-letter English words with definitions and example sentences. Perfect for word games, learning, and improving vocabulary.">
    <?php endif; ?>

    <meta name="keywords" content="3 letter words, three letter words, short words, english words, word meanings, dictionary, vocabulary">
    <meta name="author" content="3-Letter Words Dictionary">

    <!-- Open Graph Tags -->
    <meta property="og:title" content="<?php echo isset($page_title) ? $page_title . ' - 3-Letter Words Dictionary' : '3-Letter Words Dictionary'; ?>">
    <meta property="og:description" content="<?php echo isset($page_description) ? $page_description : 'Browse all three-letter English words alphabetically with definitions and example sentences.'; ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo $base_url . $_SERVER['PHP_SELF']; ?>">
    <meta property="og:site_name" content="3-Letter Words Dictionary">

    <!-- Canonical URL -->
    <link rel="canonical" href="<?php echo $base_url . $_SERVER['PHP_SELF']; ?>">

    <!-- CSS Styles -->
    <link rel="stylesheet" href="<?php echo $base_url; ?>css/style.css">

    <!-- Schema.org Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "name": "3-Letter Words Dictionary",
        "url": "<?php echo $base_url; ?>",
        "description": "Complete collection of three-letter English words with definitions and examples"
    }
    </script>
</head>
<body>
    <header class="site-header">
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <a href="<?php echo $base_url; ?>index.php">3-Letter Words</a>
                </div>
                <nav class="main-nav">
                    <ul>
                        <li<?php echo $current_page == 'index.php' ? ' class="active"' : ''; ?>>
                            <a href="<?php echo $base_url; ?>index.php">Home</a>
                        </li>
                        <li<?php echo $current_page == 'about.php' ? ' class="active"' : ''; ?>>
                            <a href="<?php echo $base_url; ?>about.php">About</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main class="site-content">
        <div class="container">
