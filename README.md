# 3-Letter Words Dictionary

A comprehensive dictionary of three-letter English words with definitions and usage examples. This web application is built with PHP and is optimized for SEO, making it a perfect resource for word games, educational purposes, and vocabulary building.

## Features

- **Complete Collection**: Contains hundreds of common and rare three-letter English words
- **Detailed Definitions**: Each word comes with a clear definition
- **Usage Examples**: Practical sentence examples for every word
- **Alphabetical Browsing**: Easy navigation through A-Z letters
- **Related Words**: Discover related words that share the same first letter
- **Responsive Design**: Works on desktop, tablet, and mobile devices
- **SEO Optimized**: Each word has its own URL and meta tags for search engines

## Technology Stack

- **Language**: PHP (compatible with PHP 7.0+)
- **Frontend**: HTML, CSS, JavaScript
- **SEO Features**: XML Sitemap, robots.txt, schema.org markup
- **Structure**: Object-oriented design with organized file structure

## Quick Start

### Local Development

1. Clone the repository:
   ```bash
   git clone https://github.com/your-username/three-letter-words.git
   ```

2. Move the files to your web server's document root (e.g., `htdocs` for XAMPP, `www` for WAMP).

3. Access the website through your localhost:
   ```
   http://localhost/three-letter-words/
   ```

### Deployment

To deploy this website to a live server:

1. Upload all files to your web hosting using FTP or your hosting provider's file manager.

2. Ensure that your server has PHP support enabled.

3. Update the sitemap URL in robots.txt to match your domain:
   ```
   Sitemap: https://yourdomain.com/sitemap.php
   ```

4. Make sure your server's .htaccess settings are compatible with your hosting provider.

## Project Structure

```
three-letter-words/
├── includes/           # Shared components
│   ├── header.php      # Site header with SEO metadata
│   └── footer.php      # Site footer
├── css/
│   └── style.css       # Main stylesheet
├── js/
│   └── script.js       # JavaScript functionality
├── index.php           # Home page with A-Z filter
├── word.php            # Word detail page
├── about.php           # About page
├── 404.php             # Custom 404 error page
├── sitemap.php         # Dynamic XML sitemap generator
├── words_data.php      # Word database and helper functions
├── robots.txt          # Search engine guidelines
├── .htaccess           # Server configuration
└── README.md           # Project documentation
```

## Customization

### Adding More Words

To add more three-letter words to the dictionary, edit the `words_data.php` file and add new entries to the `$threeLetterWords` array:

```php
[
    'word' => 'new',
    'meaning' => 'Definition of the word',
    'example' => 'Example sentence using the word.'
]
```

### Styling

The website's appearance can be customized by editing the `css/style.css` file. The design uses CSS variables which can be modified in the `:root` selector to change the color scheme:

```css
:root {
    --primary-color: #2563eb; /* Change this to update the main color */
    --primary-light: #3b82f6;
    --primary-dark: #1d4ed8;
    /* Other variables... */
}
```

## SEO Features

This project includes several SEO optimizations:

- **Meta Tags**: Dynamic title and description for each page
- **Structured Data**: schema.org markup for dictionary entries
- **XML Sitemap**: Automatically generated sitemap for search engines
- **Clean URLs**: Optional URL rewriting with .htaccess
- **Canonical URLs**: Prevents duplicate content issues
- **Open Graph Tags**: Optimized for social media sharing

## License

This project is open source and available for educational and personal use.

## Acknowledgements

- Word data compiled from various public domain sources
- Inspired by similar word dictionary websites
- Thanks to all contributors who have helped improve this project
