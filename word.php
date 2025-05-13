<?php
/**
 * 3-Letter Words Dictionary - Word Detail Page
 * Displays detailed information about a specific 3-letter word
 */

// Include the dictionary data
require_once 'words_data.php';

// Get the word from URL parameter
$word_name = isset($_GET['word']) ? trim($_GET['word']) : '';

// Find the word in our dictionary
$word_data = getWordByName($threeLetterWords, $word_name);

// If word not found, redirect to 404 page
if (!$word_data) {
    header('HTTP/1.0 404 Not Found');
    include '404.php';
    exit;
}

// Set page title and description for SEO
$page_title = strtoupper($word_data['word']) . " - 3-Letter Word Definition and Usage";
$page_description = "Definition of the 3-letter word " . strtoupper($word_data['word']) . ": " . substr($word_data['meaning'], 0, 160);

// Get related words for each position
$related_first_letter = getRelatedWords($threeLetterWords, $word_data['word'], 1, 5);
$related_second_letter = getRelatedWords($threeLetterWords, $word_data['word'], 2, 5);
$related_third_letter = getRelatedWords($threeLetterWords, $word_data['word'], 3, 5);

// Include header
include 'includes/header.php';
?>

<a href="index.php?position=1&letter=<?php echo strtoupper(substr($word_data['word'], 0, 1)); ?>" class="back-link">
    ← Back to Dictionary
</a>

<article class="word-detail">
    <div class="word-detail-header">
        <h1 class="word-detail-title"><?php echo htmlspecialchars(strtoupper($word_data['word'])); ?></h1>

        <div class="word-navigation">
            <?php
            // Get previous and next words alphabetically
            $prev_word = null;
            $next_word = null;
            $found_current = false;

            foreach ($threeLetterWords as $w) {
                if (strtolower($w['word']) === strtolower($word_data['word'])) {
                    $found_current = true;
                    continue;
                }

                if (!$found_current) {
                    $prev_word = $w;
                } else {
                    $next_word = $w;
                    break;
                }
            }
            ?>

            <div class="word-nav-links">
                <?php if ($prev_word): ?>
                <a href="word.php?word=<?php echo urlencode($prev_word['word']); ?>" class="prev-word" title="Previous word: <?php echo strtoupper($prev_word['word']); ?>">
                    ← <?php echo strtoupper($prev_word['word']); ?>
                </a>
                <?php endif; ?>

                <?php if ($next_word): ?>
                <a href="word.php?word=<?php echo urlencode($next_word['word']); ?>" class="next-word" title="Next word: <?php echo strtoupper($next_word['word']); ?>">
                    <?php echo strtoupper($next_word['word']); ?> →
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <section class="word-section">
        <h2>Definition</h2>
        <p><?php echo htmlspecialchars($word_data['meaning']); ?></p>
    </section>

    <section class="word-section">
        <h2>Example</h2>
        <p class="word-example">"<?php echo htmlspecialchars($word_data['example']); ?>"</p>
    </section>

    <section class="word-section">
        <h2>Word Analysis</h2>
        <div class="word-analysis">
            <div class="analysis-item">
                <h3>First Letter: <?php echo strtoupper($word_data['word'][0]); ?></h3>
                <p>
                    <a href="index.php?position=1&letter=<?php echo strtoupper($word_data['word'][0]); ?>" class="letter-link">
                        View all words starting with "<?php echo strtoupper($word_data['word'][0]); ?>"
                    </a>
                </p>
            </div>

            <div class="analysis-item">
                <h3>Second Letter: <?php echo strtoupper($word_data['word'][1]); ?></h3>
                <p>
                    <a href="index.php?position=2&letter=<?php echo strtoupper($word_data['word'][1]); ?>" class="letter-link">
                        View all words with "<?php echo strtoupper($word_data['word'][1]); ?>" as second letter
                    </a>
                </p>
            </div>

            <div class="analysis-item">
                <h3>Third Letter: <?php echo strtoupper($word_data['word'][2]); ?></h3>
                <p>
                    <a href="index.php?position=3&letter=<?php echo strtoupper($word_data['word'][2]); ?>" class="letter-link">
                        View all words with "<?php echo strtoupper($word_data['word'][2]); ?>" as third letter
                    </a>
                </p>
            </div>
        </div>
    </section>
</article>

<div class="related-words-container">
    <?php if (!empty($related_first_letter)): ?>
    <section class="related-words-section">
        <h2>Words Starting With "<?php echo strtoupper($word_data['word'][0]); ?>"</h2>
        <div class="related-words-list">
            <?php foreach ($related_first_letter as $related): ?>
                <a href="word.php?word=<?php echo urlencode($related['word']); ?>" class="related-word-link">
                    <?php echo htmlspecialchars(strtoupper($related['word'])); ?>
                </a>
            <?php endforeach; ?>

            <a href="index.php?position=1&letter=<?php echo strtoupper($word_data['word'][0]); ?>" class="view-all-link">
                View All →
            </a>
        </div>
    </section>
    <?php endif; ?>

    <?php if (!empty($related_second_letter)): ?>
    <section class="related-words-section">
        <h2>Words With "<?php echo strtoupper($word_data['word'][1]); ?>" as Second Letter</h2>
        <div class="related-words-list">
            <?php foreach ($related_second_letter as $related): ?>
                <a href="word.php?word=<?php echo urlencode($related['word']); ?>" class="related-word-link">
                    <?php echo htmlspecialchars(strtoupper($related['word'])); ?>
                </a>
            <?php endforeach; ?>

            <a href="index.php?position=2&letter=<?php echo strtoupper($word_data['word'][1]); ?>" class="view-all-link">
                View All →
            </a>
        </div>
    </section>
    <?php endif; ?>

    <?php if (!empty($related_third_letter)): ?>
    <section class="related-words-section">
        <h2>Words With "<?php echo strtoupper($word_data['word'][2]); ?>" as Third Letter</h2>
        <div class="related-words-list">
            <?php foreach ($related_third_letter as $related): ?>
                <a href="word.php?word=<?php echo urlencode($related['word']); ?>" class="related-word-link">
                    <?php echo htmlspecialchars(strtoupper($related['word'])); ?>
                </a>
            <?php endforeach; ?>

            <a href="index.php?position=3&letter=<?php echo strtoupper($word_data['word'][2]); ?>" class="view-all-link">
                View All →
            </a>
        </div>
    </section>
    <?php endif; ?>
</div>

<!-- Add schema.org structured data for SEO -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "DefinedTerm",
    "name": "<?php echo htmlspecialchars(strtoupper($word_data['word'])); ?>",
    "description": "<?php echo htmlspecialchars($word_data['meaning']); ?>",
    "inDefinedTermSet": {
        "@type": "DefinedTermSet",
        "name": "3-Letter Words Dictionary"
    }
}
</script>

<?php
// Include footer
include 'includes/footer.php';
?>
