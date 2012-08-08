<?php
    /**
     * PHP Basic Usage Example Code.
     *
     * This file shows a very basic example of how PHP
     * can be used to generate dynamic content for
     * display in a web browser.
     * 
     * @author    Xander Shepherd <n00b@n00bsys0p.co.uk>
     * @version   0.1
     * @package   basic-php-usage-example
     */

    /**
     * Generate the <head> section of the page.
     *
     * A function to wrap the title in relevant HTML
     * tags.
     *
     * This documentation is in PHPDoc format,
     * to allow for ease of documentation production.
     *
     * @param   string  $title  The page's title
     * @return  string          Formatted HTML <head> section
     */
    function generateHeader($title) {
      return '<head><title>' . $title . '</title></head>';
    }

    /**
     * Generate the <body> section  of the HTML file.
     *
     * @param   string  $title  The page's title
     * @param   string  $text   The paragraph's text.
     * @return  string          Formatted HTML <body> section
     */
    function generateBody($title, $text) {
        return '<h1>' . $title . '</h1>' . "\n" . '<p>' . $text . '</p>';
    }

    /**
     * Put all the other functions together to produce a full
     * HTML page.
     *
     * @param   string  $title    The document's title
     * @param   string  $content  The main content for the page
     * @return  string            Full formatted HTML page
     */
    function generateHTML($title = 'Default Title', $content = 'Default Content') {
        $head = generateHeader($title);

        $body = generateBody($title, $content);

        return '<html>' . $head . $body . '</html>';
    }

    // Main
    $content = generateHTML('Page Title!');

    print $content;
?>
