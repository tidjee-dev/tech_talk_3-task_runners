# Examples of `Castor` functions

## `io()`

Doc: [Symfony Console](https://symfony.com/doc/current/console/style.html#titling-methods)

| Function                | Description                   | Usage                                                                                                      |
| ----------------------- | ----------------------------- | ---------------------------------------------------------------------------------------------------------- |
| `io()->title`           | Display a title               | `io()->title('Hello, World!')`                                                                             |
| `io()->section`         | Display a section             | `io()->section('Section Title')`                                                                           |
| `io()->text`            | Display text                  | `io()->text('Hello, World!')` or `io()->text(['Line 1', 'Line 2'])`                                        |
| `io()->comment`         | Display a comment             | `io()->comment('This is a comment.')` or `io()->comment(['...', 'This is a multiline comment.', '...'])`   |
| `io()->listing`         | Display a listing             | `io()->listing(['Item 1', 'Item 2', 'Item 3'])`                                                            |
| `io()->table`           | Display a table               | `io()->table(['Header 1', 'Header 2'], [['Value 1', 'Value 2']])`                                          |
| `io()->horizontalTable` | Display a horizontal table    | `io()->horizontalTable(['Header 1', 'Header 2'], [['Value 1', 'Value 2']])`                                |
| `io()->definitionList`  | Display a definition list     | `io()->definitionList('Title 1', 'Description 1', 'Title 2', 'Description 2')`                             |
| `io()->newline()`       | Add a newline                 | `io()->newline()`                                                                                          |
| `io()->newLine($i)`     | Add $i newline                | `io()->newLine(3)`                                                                                         |
| `io()->note`            | Display a note                | `io()->note('This is a note.')` or `io()->note(['...', 'This is a multiline note.', '...'])`               |
| `io()->caution`         | Display a caution message     | `io()->caution('This is a caution.')` or `io()->caution(['...', 'This is a multiline caution.', '...'])`   |
| `io()->progressStart`   | Start a progress bar          | `io()->progressStart(10)`                                                                                  |
| `io()->progressAdvance` | Advance the progress bar      | `io()->progressAdvance()`                                                                                  |
| `io()->progressFinish`  | Finish the progress bar       | `io()->progressFinish()`                                                                                   |
| `io()->progressIterate` | Iterate over an iterable      | `$iterable = [1, 2, 3, 4, 5, 6]; foreach (io()->progressIterate($iterable) as $value) { usleep(100000); }` |
| `io()->ask`             | Ask a question                | `io()->ask('What is your name?')`                                                                          |
| `io()->askHidden`       | Ask a question in hidden mode | `io()->askHidden('What is your password?')`                                                                |
| `io()->confirm`         | Ask a confirmation question   | `io()->confirm('Do you want to continue?')`                                                                |
| `io()->success`         | Display a success message     | `io()->success('This is a success.')`                                                                      |
| `io()->info`            | Display an info message       | `io()->info('This is an info.')`                                                                           |
| `io()->warning`         | Display a warning message     | `io()->warning('This is a warning.')`                                                                      |
| `io()->error`           | Display an error message      | `io()->error('This is an error.')`                                                                         |
