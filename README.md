# _Word_Frequency_

#### _App that counts how many times a word occurs in a given text._

#### By _**Carlos Munoz Kampff**_

## Description

_By using search and counting functions this app can help the user find any word within the given text. It will also say how many time that text occurred.

## Specifications

| Behavior                                              |   Input example   |  Output example |
|-------------------------------------------------------|:-----------------:|:---------------:|
|1)User inputs a lowercase word and inputs the same lowercase word. The test will check that the lowercase word is matched and counted once. | "apple", "apple" | 1 match |

|2a)User inputs an uppercase word and inputs the same word in lowercase. The test will check that the word is matched regardless of case and be counted once. | "Apple", "apple" | 1 match|
|2b)User inputs a word and inputs a different word. The test will check that no match is found | "apple", "orange"| 0 matches |
3)User inputs a word and inputs a phrase that includes the word twice. The test will check that the word is counted twice ignoring other input.| "apple", "The Apple logo is meaningful because it alludes to the apple in the tree of knowledge." | 2 matches |
3b)User inputs a word and inputs a phrase that includes the word twice. The test will check that the word is matched even if followed by possessive -'s-| "apple", "Apple's logo is meaningful because it alludes to the apple in the tree of knowledge." | 2 matches |
4)User inputs a word and choses by button press to look for and count only the case specific matches. The test will check that the match is indeed case sensitive. | "apple", "The Apple logo is meaningful because it alludes to the apple in the tree of knowledge."| 1 exact match |
5)User inputs a word, text to search and a replacement word. It will replace only case specific words. The test will check if the phrase is changed correctly. | "apple", "The Apple logo is meaningful because it alludes to the apple in the tree of knowledge.", "orange" | "The Apple logo is meaningful because it alludes to the orange in the tree of knowledge."|
6)User inputs phrases with punctuation and returns can find matches. The test will check that a match is found even if the word has an adjacent punctuation. | "apple", "Apple, banana, orange."| 1 match.|



## Setup/Installation Requirements


* _Clone repository from github. https://github.com/elmunoz42/
* _Initiate a php server in terminal within the project directory._
* _In Terminal run: Install composer_
* _Open localhost:8000_
* _Enjoy_

_web browser and PHP 5 are necessary to operate this _

## Known Bugs

_There are no known present at this time._

## Support and contact details

_No support._

## Technologies Used

* _PHP_
* _Silex_
* _Twig_
* _PHPUNIT tests_

### License

*MIT*

Copyright (c) 2017 **_Carlos Munoz Kampff_**
