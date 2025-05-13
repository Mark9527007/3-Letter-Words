<?php
/**
 * 3-Letter Words Dictionary - 404 Not Found Page
 * Displayed when a word or page is not found
 */

// Set page title and description
$page_title = "404 - Word Not Found";
$page_description = "The word or page you're looking for cannot be found in our 3-letter words dictionary.";

// Include header
include 'includes/header.php';
?>

<div class="page-header text-center">
    <h1>404 - Word Not Found</h1>
</div>

<div class="word-detail text-center">
    <p>The word you're looking for couldn't be found in our dictionary.</p>
    <p>It might not be a valid 3-letter word or it's not in our database yet.</p>

    <div class="mt-4">
        <a href="index.php" class="related-word-link">Go back to the dictionary</a>
    </div>
</div>

<?php
// Include footer
include 'includes/footer.php';
?>
