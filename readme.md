# String Calculator Kata

_This project is a TDD Kata made to improve your code, your refactor and test-first skills._

_Idea from [Roy Osherove](https://osherove.com/tdd-kata-1/)_.

##Before you start 🚀

1. Try not to read ahead.
2. Do one task at a time. The trick is to learn to work incrementally.
3. Make sure you only test for correct inputs. There is no need to test for invalid inputs for this kata.

#### Step 1
Create a simple string calculator with a method signature:

```
    public function add (string $numbers): int
```

The method can take up to **two numbers**, separated by commas, and will return their sum.
I.E: "" or "1" or 1,2" as inputs. (empty strings will return 0)

##### Hints
- Start with the simplest test case of an empty string and move to one and two numbers
- Remember to solve things as simply as possible so that you force yourself to write tests you did not think about
- Remember to refactor after each passing test

#### Step 2
Allow the add method to handle an unknown amount of numbers.

#### Step 3
Allow the add method to handle new lines between numbers (instead of commas).

The following input is _ok_:
```
    "1\n2,3" //Returns 6
```

The following input is _NOT ok_:
```
    "1,\n" (not need to prove it - just clarifying)
```

#### Step 4

Provide support for different delimiters.

To change a delimiter, the beginning of the string will contain a separate line that looks like this:

```
    "//[delimiter]\n[numbers…]"
```

I.E: "//;\n1;2" should return three where the default delimiter is ";".

- This first line is optional.
- All existing scenarios should still be supported.

#### Step 5
Calling add with a negative number will throw an exception called NegativesNotAllowedException and the negative that was passed.
- If there are multiple negatives, _show all of them_ in the exception message.


#### Step 6
Numbers bigger than 1000 should be ignored, so adding 2 + 1001 will return 2.

#### Step 7
Delimiters can be of any length with the following format: “//[delimiter]\n” for example: “//[***]\n1***2***3” should return 6

#### Step 8
Allow multiple delimiters like this:
```
    "//[delim1][delim2]\n" 
```
I.E: "//[*][%]\n1*2%3" should return 6.

#### Step 9
Make sure that the method can also handle multiple delimiters with length longer than one char.