<?php
/**
 * 3-Letter Words Dictionary - Home Page
 * Displays an alphabetical list of 3-letter words with multiple filtering options
 */

// Set page title and description for SEO
$page_title = "3-Letter Words Dictionary - Complete List with Definitions";
$page_description = "Browse a complete collection of three-letter English words with definitions and example sentences. Perfect for word games, learning, and improving vocabulary.";

// Include the dictionary data
require_once 'words_data.php';

// Get filter parameters
$position = isset($_GET['position']) ? intval($_GET['position']) : 1;
if ($position < 1 || $position > 3) {
    $position = 1; // Default to first letter if invalid
}

$letter = isset($_GET['letter']) ? strtoupper($_GET['letter']) : 'A';
if (!preg_match('/^[A-Z]$/', $letter)) {
    $letter = 'A'; // Fallback if invalid letter
}

// Get words filtered by position and letter
$filtered_words = getWordsByPositionLetter($threeLetterWords, $position, $letter);

// Get word statistics for the filter counts
$word_stats = getWordStats($threeLetterWords);

// Create array of all letters A-Z
$letters = range('A', 'Z');

// Include header
include 'includes/header.php';
?>

<div class="page-header">
    <h1>3-Letter Words Dictionary</h1>
    <p>Browse all three-letter English words filtered by any letter position. Click on any word to see its detailed definition and example usage.</p>
</div>

<!-- Filter Tabs -->
<div class="filter-tabs">
    <div class="tabs-header">
        <button class="tab-btn <?php echo ($position == 1) ? 'active' : ''; ?>" data-position="1">First Letter</button>
        <button class="tab-btn <?php echo ($position == 2) ? 'active' : ''; ?>" data-position="2">Second Letter</button>
        <button class="tab-btn <?php echo ($position == 3) ? 'active' : ''; ?>" data-position="3">Third Letter</button>
    </div>

    <div class="tabs-content">
        <form id="letter-filter-form" method="get" action="index.php">
            <input type="hidden" id="selected-position" name="position" value="<?php echo $position; ?>">
            <input type="hidden" id="selected-letter" name="letter" value="<?php echo $letter; ?>">

            <div class="letters-grid">
                <?php foreach ($letters as $l): ?>
                    <?php
                        // Get count for current position and letter
                        $letterLower = strtolower($l);
                        $count = 0;

                        switch ($position) {
                            case 1:
                                $count = isset($word_stats['byFirstLetter'][$letterLower]) ? $word_stats['byFirstLetter'][$letterLower] : 0;
                                break;
                            case 2:
                                $count = isset($word_stats['bySecondLetter'][$letterLower]) ? $word_stats['bySecondLetter'][$letterLower] : 0;
                                break;
                            case 3:
                                $count = isset($word_stats['byThirdLetter'][$letterLower]) ? $word_stats['byThirdLetter'][$letterLower] : 0;
                                break;
                        }
                    ?>
                    <button
                        type="button"
                        class="letter-btn <?php echo ($l === $letter) ? 'active' : ''; ?> <?php echo ($count == 0) ? 'disabled' : ''; ?>"
                        data-letter="<?php echo $l; ?>"
                        data-count="<?php echo $count; ?>"
                        <?php echo ($count == 0) ? 'disabled' : ''; ?>
                    >
                        <?php echo $l; ?>
                        <span class="letter-count"><?php echo $count; ?></span>
                    </button>
                <?php endforeach; ?>
            </div>
        </form>
    </div>
</div>

<section class="word-list-section">
    <div class="word-list-header">
        <h2>
            <?php if ($position == 1): ?>
                Words Starting With "<?php echo $letter; ?>"
            <?php elseif ($position == 2): ?>
                Words With "<?php echo $letter; ?>" as Second Letter
            <?php elseif ($position == 3): ?>
                Words With "<?php echo $letter; ?>" as Third Letter
            <?php endif; ?>
            <span class="word-count">(<?php echo count($filtered_words); ?> words)</span>
        </h2>
    </div>

    <?php if (empty($filtered_words)): ?>
        <div class="word-list-empty">
            No 3-letter words found with "<?php echo $letter; ?>" in position <?php echo $position; ?>.
        </div>
    <?php else: ?>
        <ul class="word-list">
            <?php foreach ($filtered_words as $word): ?>
                <li class="word-item">
                    <a href="word.php?word=<?php echo urlencode($word['word']); ?>">
                        <span class="word-title"><?php echo htmlspecialchars(strtoupper($word['word'])); ?></span>
                        <div class="word-meaning"><?php echo htmlspecialchars($word['meaning']); ?></div>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</section>

<div class="dictionary-stats text-center mt-4">
    <p>Our dictionary contains <?php echo $word_stats['total']; ?> three-letter words with detailed definitions and examples.</p>

    <div class="filter-tips">
        <p class="mt-2 text-sm">
            <strong>Tip:</strong> Click on "First Letter", "Second Letter", or "Third Letter" to filter words by different positions.
        </p>
    </div>
</div>

<?php
// Include footer
include 'includes/footer.php';
?>
