# Regular Expressions (Regex) Guide

## What is Regex?

Regex, short for regular expression, is a powerful and flexible sequence of characters that defines a search pattern. It is a string of text that describes a set of strings, according to certain syntax rules. Regular expressions are used for pattern matching within strings, making them a valuable tool for tasks such as searching, extracting, and manipulating text.

## Why Learn Regex?

- Efficient text processing
- Pattern-based data validation
- Powerful search and replace operations
- Versatility in handling string manipulation tasks

## Regex Syntax and Fundamentals

### 1. Exact Match

#### Overview

The exact match in regex involves finding a specific sequence of characters within a given text. This is useful when you want to locate a precise word or phrase. In PHP, the `preg_match` function is commonly used for regex matching.

#### PHP Example

```php
<?php
$text = "Hello World, Hello Universe";

$pattern = '/Hello/';

if (preg_match($pattern, $text)) {
    echo "Exact match found!";
} else {
    echo "No match found.";
}
?>
```

#### Explanation

    /Hello/: This regex pattern specifies the exact sequence of characters 'Hello'.

### 2. Character Set

#### Overview

A character set in regex allows you to match any one character from a group of characters. This is useful when you want to find variations of a specific sequence.

##### PHP Example

```php
<?php
$text = "tai, thi, toi, thoi";

// character set match of 'tai' or 'thi'
$pattern = '/t[ah]i/';

if (preg_match($pattern, $text, $matches)) {
    echo "Character set match found: " . $matches[0];
} else {
    echo "No match found.";
}
?>
```

#### 2.1 Match Ranges in Regex

Sometimes you may want to match a group of characters that are sequential in nature, such as any uppercase English letter. The range operator `-` can be used in a character set to simplify this.

##### PHP Example

```php
<?php
$text = "Hello 123";

// Regex pattern for matching uppercase letters
$pattern = '/[A-Z]/';

if (preg_match($pattern, $text, $matches)) {
    echo "Uppercase letter found: " . $matches[0];
} else {
    echo "No match found.";
}
?>
```

#### 2.2 Match Any Character Not in the Set

If you want to match any character except those specified in the set, you can use the ^ symbol as a prefix in the character set.

##### PHP Example

```php

<?php
$text = "Hello123";

// Regex pattern for matching any character except uppercase letters
$pattern = '/[^A-Z]/';

if (preg_match($pattern, $text, $matches)) {
    echo "Character not in set found: " . $matches[0];
} else {
    echo "No match found.";
}
?>
```

### 3. Character Classes

#### Overview

Character classes in regex allow you to match a single character from a specified set of characters. They provide a concise way to represent commonly used character groups.

#### 3.1 Predefined Character Classes

Predefined character classes simplify the matching of common character groups. Here are some examples:

- `.`: Matches anything except newline.
- `\d`: Matches any digit (equivalent to `[0-9]`).
- `\D`: Matches any non-digit character.
- `\w`: Matches any word character (alphanumeric + underscore).
- `\W`: Matches any non-word character.
- `\s`: Matches any whitespace character.
- `\S`: Matches any non-whitespace character.

##### PHP Example

```php
<?php
$text = "Hello 123";

// Regex pattern for matching a digit
$pattern = '/\d/';

if (preg_match($pattern, $text, $matches)) {
    echo "Digit found: " . $matches[0];
} else {
    echo "No match found.";
}
// Output: Digit found: 1
?>
```

#### 3.2 Custom Character Classes

You can create custom character classes to match specific sets of characters. Use square brackets [] to define the custom class.

##### PHP Example

```php

<?php
$text = "apple, banana, cherry";

// Regex pattern for matching fruit names starting with 'a' or 'b'
$pattern = '/[ab]\w+/';

if (preg_match($pattern, $text, $matches)) {
    echo "Match found: " . $matches[0];
} else {
    echo "No match found.";
}
// Output: Match found: apple
?>
```

#### 3.3 Negating Character Classes

To match any character except those in the specified set, use the ^ symbol as a prefix within the custom character class.

##### PHP Example

```php

<?php
$text = "apple, banana, cherry";

// Regex pattern for matching fruit names not starting with 'a'
$pattern = '/[^a]\w+/';

if (preg_match($pattern, $text, $matches)) {
    echo "Match found: " . $matches[0];
} else {
    echo "No match found.";
}
// Output: Match found: banana
?>
```

### 4. Metacharacters and Escaping

#### Overview

Metacharacters in regex have special meanings, and sometimes you might want to match them literally. Escaping with a backslash \ allows you to do just that.

##### PHP Example

```php

<?php
// Input text
$text = "The price is $20.";

// Regex pattern for matching the dollar sign '$' literally
$pattern = '/\$/';

// Perform the regex match
if (preg_match($pattern, $text, $matches)) {
    echo "Match found: " . $matches[0];
    // Output: Match found: $
} else {
    echo "No match found.";
}
?>
```

### 5. Quantifiers

#### Overview

Quantifiers in regex allow you to specify the number of occurrences of a character or a group of characters. They enhance the flexibility of your regex patterns.

#### 5.1 Basic Quantifiers

Here are some basic quantifiers:

- `*`: Matches 0 or more occurrences.
- `+`: Matches 1 or more occurrences.
- `?`: Matches 0 or 1 occurrence.

##### PHP Example

```php

<?php
// Input text
$text = "aaaab";

// Regex pattern for matching 'a' repeated 2 or more times
$pattern = '/a{2,}/';

// Perform the regex match
if (preg_match($pattern, $text, $matches)) {
    echo "Match found: " . $matches[0];
    // Output: Match found: aaaa
} else {
    echo "No match found.";
}
?>
```

In this example, the pattern `/a{2,}/` matches 'a' repeated 2 or more times in the input text "aaaab."

#### 5.2 Greedy vs. Lazy Quantifiers

Quantifiers are greedy by default, meaning they match as much as possible. You can make them lazy by adding a ? after the quantifier.

##### PHP Example

```php

<?php
$text = "<p>First paragraph</p><p>Second paragraph</p>";

// Greedy regex pattern for matching paragraphs
$greedyPattern = '/<p>.*<\/p>/';

// Lazy regex pattern for matching paragraphs
$lazyPattern = '/<p>.*?<\/p>/';

if (preg_match($greedyPattern, $text, $greedyMatches)) {
    echo "Greedy match found: " . $greedyMatches[0];
    // Output: Greedy match found: <p>First paragraph</p><p>Second paragraph</p>
} else {
    echo "No greedy match found.";
}

if (preg_match($lazyPattern, $text, $lazyMatches)) {
    echo "\nLazy match found: " . $lazyMatches[0];
    // Output: Lazy match found: <p>First paragraph</p>
} else {
    echo "\nNo lazy match found.";
}
?>
```

In this example, the greedy pattern matches everything between the first `<p>` and the last `</p>`, while the lazy pattern matches each individual paragraph separately.

### 6. Anchors and Boundaries

Anchors and boundaries in regex are used to define specific positions within the text where a match should occur. They help in making sure that a pattern is found only at the beginning or end of a line, word, or string.

#### 6.1 Start and End Anchors

Start ^ and end $ anchors are used to match the beginning and end of a line, respectively.

##### PHP Example

```php

<?php
// Input text
$text = "The quick brown fox";

// Regex pattern for matching 'The' at the start of the line
$pattern = '/^The/';

// Perform the regex match
if (preg_match($pattern, $text, $matches)) {
    echo "Match found: " . $matches[0];
    // Output: Match found: The
} else {
    echo "No match found.";
}
?>
```

#### 6.2 Word Boundaries

Word boundaries \b are used to match a pattern only at the beginning or end of a word.
PHP Example

```php

<?php
// Input text
$text = "This is a test.";

// Regex pattern for matching 'is' as a whole word
$pattern = '/\bis\b/';

// Perform the regex match
if (preg_match($pattern, $text, $matches)) {
    echo "Match found: " . $matches[0];
    // Output: Match found: is
} else {
    echo "No match found.";
}
?>
```

#### 6.3 Negative Word Boundaries

Negative word boundaries \B are used to match a pattern only when it is not at the beginning or end of a word.
PHP Example

```php

<?php
// Input text
$text = "This is not a test.";

// Regex pattern for matching 'is' when not at a word boundary
$pattern = '/\Bis\B/';

// Perform the regex match
if (preg_match($pattern, $text, $matches)) {
    echo "Match found: " . $matches[0];
    // Output: Match found: is
} else {
    echo "No match found.";
}
?>
```

## Grouping and Capturing

### Overview

Capture groups in regex are sub-expressions enclosed in parentheses (). They allow you to isolate and extract specific parts of a matched pattern. You can have any number of capture groups, and even nest them within each other.

#### 1. Basic Capture Group

The expression (The ){2} matches 'The ' twice. Without a capture group, the expression The {2} would match 'The' followed by 2 spaces, as the quantifier applies to the space character and not 'The ' as a group.

##### PHP Example

```php

<?php
// Input text
$text = "The The end";

// Regex pattern for capturing 'The ' twice
$pattern = '/(The ){2}/';

// Perform the regex match
if (preg_match($pattern, $text, $matches)) {
    echo "Full match: " . $matches[0];
    // Output: Full match: The The
    echo "\nCaptured group: " . $matches[1];
    // Output: Captured group: The 
} else {
    echo "No match found.";
}
?>
```

#### 2. Matching Inside Capture Groups

You can match any pattern inside capture groups as you would with any valid regex. For example, (is\s+){2} matches if it finds 'is' followed by 1 or more spaces twice.

##### PHP Example

```php

<?php
// Input text
$text = "This is a test. This is another test.";

// Regex pattern for matching 'is' followed by 1 or more spaces twice
$pattern = '/(is\s+){2}/';

// Perform the regex match
if (preg_match($pattern, $text, $matches)) {
    echo "Full match: " . $matches[0];
    // Output: Full match: is a test. is another
    echo "\nCaptured group: " . $matches[1];
    // Output: Captured group: is 
} else {
    echo "No match found.";
}
?>
```

#### 3. Logical OR in Regex with Capture Groups

You can use the "|" symbol to match multiple patterns. For example, This is (good|bad|sweet) matches 'This is ' followed by any of 'good,' 'bad,' or 'sweet.'

##### PHP Example

```php

<?php
// Input text
$text = "This is good. This is bad. This is sweet.";

// Regex pattern for matching 'This is ' followed by 'good,' 'bad,' or 'sweet'
$pattern = '/This is (good|bad|sweet)/';

// Perform the regex match
if (preg_match($pattern, $text, $matches)) {
    echo "Full match: " . $matches[0];
    // Output: Full match: This is good
    echo "\nCaptured group: " . $matches[1];
    // Output: Captured group: good 
} else {
    echo "No match found.";
}
?>
```

#### 4. Referencing Capture Groups

Capture groups can be referenced in the same expression or during replacements. The reference is done using '\n', where 'n' is the index of the capture group.

##### PHP Example

```php

<?php
// Input text
$text = "This is This power";

// Regex pattern for capturing and referencing 'This'
$pattern = '/(This) is \1 power/';

// Perform the regex match
if (preg_match($pattern, $text, $matches)) {
    echo "Full match: " . $matches[0];
    // Output: Full match: This is This power
    echo "\nCaptured group: " . $matches[1];
    // Output: Captured group: This 
} else {
    echo "No match found.";
}
?>
```

## Advanced Techniques

### Overview

Lookarounds in regex allow you to create more complex patterns by looking behind or ahead of the current position in the text.

### 1. Lookbehinds

A lookbehind asserts that a certain pattern can be matched before the main part of the regex.

#### 1.1 Positive Lookbehind

In this example, we want to find the word "apple" only if it is preceded by the word "green".

##### PHP Example

```php

<?php
// Input text
$text = "The green apple is tasty.";

// Regex pattern for a positive lookbehind
$pattern = '/(?<=green )apple/';

// Perform the regex match
if (preg_match($pattern, $text, $matches)) {
    echo "Match found: " . $matches[0];
    // Output: Match found: apple
} else {
    echo "No match found.";
}
?>
```

#### 1.2 Negative Lookbehind

In this example, we want to find the word "apple" only if it is not preceded by the word "red".
PHP Example

```php

<?php
// Input text
$text = "The red apple is not good.";

// Regex pattern for a negative lookbehind
$pattern = '/(?<!red )apple/';

// Perform the regex match
if (preg_match($pattern, $text, $matches)) {
    echo "Match found: " . $matches[0];
    // Output: No match found.
} else {
    echo "No match found.";
}
?>
```

### 2. Lookaheads

Lookaheads assert that a certain pattern can be matched after the main part of the regex.

#### 2.1 Positive Lookahead

In this example, we want to find the word "apple" only if it is followed by the word "pie".

##### PHP Example

```php

<?php
// Input text
$text = "I love apple pie.";

// Regex pattern for a positive lookahead
$pattern = '/apple(?= pie)/';

// Perform the regex match
if (preg_match($pattern, $text, $matches)) {
    echo "Match found: " . $matches[0];
    // Output: Match found: apple
} else {
    echo "No match found.";
}
?>
```

#### 2.2 Negative Lookahead

In this example, we want to find the word "apple" only if it is not followed by the word "cake".

##### PHP Example

```php

<?php
// Input text
$text = "I have an apple cake.";

// Regex pattern for a negative lookahead
$pattern = '/apple(?! cake)/';

// Perform the regex match
if (preg_match($pattern, $text, $matches)) {
    echo "Match found: " . $matches[0];
    // Output: No match found.
} else {
    echo "No match found.";
}
?>
```

## Flags

Flags in regular expressions are modifiers that alter the behavior of a regex pattern. They can control aspects such as case sensitivity, multiline matching, and more. PHP supports various flags when using PCRE (Perl Compatible Regular Expressions). Here's an overview of commonly used flags:

### i - Case-Insensitive Matching

The i flag enables case-insensitive matching, making the pattern match regardless of letter case.

#### PHP Example

```php

<?php
// Input text
$text = "Hello, World!";

// Regex pattern for case-insensitive matching of 'hello'
$pattern = '/hello/i';

// Perform the regex match
if (preg_match($pattern, $text, $matches)) {
    echo "Match found: " . $matches[0];
    // Output: Match found: Hello
} else {
    echo "No match found.";
}
?>
```


### m - Multiline Matching

The m flag enables multiline matching, allowing ^ and $ to match the start and end of each line within the input text.

#### PHP Example

```php

<?php
// Input text
$text = "Line 1\nLine 2\nLine 3";

// Regex pattern for multiline matching of lines starting with 'Line'
$pattern = '/^Line/m';

// Perform the regex match
if (preg_match_all($pattern, $text, $matches)) {
    print_r($matches[0]);
    /*
    Output:
    Array
    (
        [0] => Line 1
        [1] => Line 2
    )
    */
} else {
    echo "No matches found.";
}
?>
```


### s - Dotall Matching

The s flag enables dotall matching, allowing the dot (.) to match newline characters as well.

#### PHP Example

```php

<?php
// Input text
$text = "Line 1\nLine 2\nLine 3";

// Regex pattern for dotall matching of 'Line 1.Line 2'
$pattern = '/Line 1.Line 2/s';

// Perform the regex match
if (preg_match($pattern, $text, $matches)) {
    echo "Match found: " . $matches[0];
    // Output: Match found: Line 1\nLine 2
} else {
    echo "No match found.";
}
?>
```


### x - Extended Flag

The x flag enables extended mode, allowing the use of whitespace and comments within the pattern for better readability.

#### PHP Example

```php

<?php
// Input text
$text = "Hello, World!";

// Regex pattern in extended mode for matching 'hello'
$pattern = '/
    hello  # Match 'hello'
/ix';

// Perform the regex match
if (preg_match($pattern, $text, $matches)) {
    echo "Match found: " . $matches[0];
    // Output: Match found: Hello
} else {
    echo "No match found.";
}
?>
```

### U - Ungreedy Matching

The U flag makes the quantifiers (*, +, ?, and {}) behave in a non-greedy way, matching as little characters as possible.

#### PHP Example

```php

<?php
// Input text
$text = "This is <b>bold</b> and <i>italic</i>";

// Regex pattern for ungreedy matching of HTML tags
$pattern = '/<.*?>/U';

// Perform the regex match
if (preg_match_all($pattern, $text, $matches)) {
print_r($matches[0]);
/*
Output:
Array
(
[0] => <b>
[1] => </b>
[2] => <i>
[3] => </i>
)
*/
} else {
echo "No matches found.";
}
?>
```

## PCRE Functions

PHP provides a set of functions for working with PCRE (Perl Compatible Regular Expressions), allowing developers to perform various operations like matching, searching, and replacing text using regular expressions.

### preg_match_all

The preg_match_all function performs a global regular expression match on a string and returns all matches.

#### PHP Example

```php

<?php
// Input text
$text = "apple, banana, cherry";

// Regex pattern for matching words
$pattern = '/\b\w+\b/';

// Perform the regex global match
if (preg_match_all($pattern, $text, $matches)) {
    print_r($matches);
    /*
    Output:
    Array
    (
        [0] => Array
            (
                [0] => apple
                [1] => banana
                [2] => cherry
            )

    )
    */
} else {
    echo "No matches found.";
}
?>
```

### preg_match

The preg_match function performs a regular expression match on a string and returns the first match.

#### PHP Example

```php

<?php
// Input text
$text = "The quick brown fox jumps over the lazy dog.";

// Regex pattern for matching 'fox'
$pattern = '/\bfox\b/';

// Perform the regex match
if (preg_match($pattern, $text, $matches)) {
    echo "Match found: " . $matches[0];
    // Output: Match found: fox
} else {
    echo "No match found.";
}
?>
```

### preg_quote

The preg_quote function quotes regular expression characters in a string.

#### PHP Example

```php

<?php
// Input text
$text = "Escape special characters: [ ] ( ) { } . * + ? ^ $ | \\ /";

// Quote regular expression characters
$quotedText = preg_quote($text);

echo $quotedText;
// Output: Escape special characters: \[ \] \( \) \{ \} \. \* \+ \? \^ \$ \| \\ \/
?>
```

### preg_filter

The preg_filter function performs a regular expression search and replace.

#### PHP Example

```php

<?php
// Input text
$text = "Hello, world!";

// Regex pattern for replacing 'world' with 'PHP'
$pattern = '/world/';

// Perform the regex search and replace
$replacedText = preg_filter($pattern, 'PHP', $text);

echo $replacedText;
// Output: Hello, PHP!
?>
```

### preg_grep

The preg_grep function returns array entries that match the pattern.

#### PHP Example

```php

<?php
// Input array
$array = ["apple", "banana", "cherry"];

// Regex pattern for matching words starting with 'b'
$pattern = '/^b/';

// Perform the regex grep
$filteredArray = preg_grep($pattern, $array);

print_r($filteredArray);
/*
Output:
Array
(
    [1] => banana
)
*/
?>
```

### preg_replace

The preg_replace function performs a regular expression search and replace on a string.

#### PHP Example

```php

<?php
// Input text
$text = "Hello, world!";

// Regex pattern for replacing 'world' with 'PHP'
$pattern = '/world/';

// Perform the regex search and replace
$replacedText = preg_replace($pattern, 'PHP', $text);

echo $replacedText;
// Output: Hello, PHP!
?>
```

### preg_split

The preg_split function splits a string by a regular expression.

#### PHP Example

```php

<?php
// Input text
$text = "apple, banana, cherry";

// Regex pattern for splitting by comma and space
$pattern = '/, /';

// Perform the regex split
$splitArray = preg_split($pattern, $text);

print_r($splitArray);
/*
Output:
Array
(
    [0] => apple
    [1] => banana
    [2] => cherry
)
*/
?>
```
