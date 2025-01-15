<?php

use function Castor\io;

use Castor\Attribute\AsTask;
use function Castor\capture;
use Symfony\Component\Console\Helper\TableSeparator;

#[AsTask(description: 'Welcome to Castor!')]
function hello(): void
{
    $currentUser = capture('whoami');

    io()->title(sprintf('Hello %s!', $currentUser));
}

#[AsTask(description: 'Show "io()" titling methods', namespace: 'test-io')]
function titling(): void
{
    io()->title('Titling Methods');

    io()->title('Title');
    io()->section('Section');
}

#[AsTask(description: 'Show "io()" content methods', namespace: 'test-io')]
function content(): void
{
    io()->title('Content Methods');

    io()->section('Text');
    io()->text('This is a text.');
    io()->text(
        ['...', 'This is a multiline text.', '...']
    );

    io()->section('Comment');
    io()->comment('This is a comment.');
    io()->comment(
        ['...', 'This is a multiline comment.', '...']
    );

    io()->section('List of items:');
    $items = ['Item 1', 'Item 2', 'Item 3'];
    io()->listing($items);

    io()->section('Vertical table:');
    $headers = ['Header 1', 'Header 2', 'Header 3'];
    $rows = [
        ['Row 1, Column 1', 'Row 1, Column 2', 'Row 1, Column 3'],
        ['Row 2, Column 1', 'Row 2, Column 2', 'Row 2, Column 3'],
        ['Row 3, Column 1', 'Row 3, Column 2', 'Row 3, Column 3'],
    ];
    io()->table($headers, $rows);

    io()->section('Horizontal table:');
    io()->horizontalTable($headers, $rows);

    io()->section('Definition list:');
    io()->definitionList(
        'Title 1',
        ['Term 1' => 'Definition 1'],
        ['Term 2' => 'Definition 2'],
        ['Term 3' => 'Definition 3'],
        new TableSeparator(),
        'Title 2',
        ['Term 4' => 'Definition 4'],
        ['Term 5' => 'Definition 5'],
        ['Term 6' => 'Definition 6'],
    );

    io()->section('Newline:');
    io()->newline();

    io()->section('Newline(3):');
    io()->newline(3);
}

#[AsTask(description: 'Show "io()" admonition methods', namespace: 'test-io')]
function admonition(): void
{
    io()->title('Admonition Methods');

    io()->section('Note:');
    io()->note('This is a note.');
    io()->note(
        ['...', 'This is a multiline note.', '...']
    );

    io()->section('Caution:');
    io()->caution('This is a caution.');
    io()->caution(
        ['...', 'This is a multiline caution.', '...']
    );
}

#[AsTask(description: 'Show "io()" progress methods', namespace: 'test-io')]
function progress(): void
{
    io()->title('Progress Methods');

    io()->section('Progress Bar:');
    io()->progressStart(10);
    for ($i = 0; $i < 10; $i++) {
        usleep(100000);
        io()->progressAdvance();
    }
    io()->progressFinish();

    io()->section('Progress Bar with iterable:');
    $iterable = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
    foreach (io()->progressIterate($iterable) as $value) {
        usleep(100000);
    }
}

#[AsTask(description: 'Show "io()" user input methods', namespace: 'test-io')]
function input(): void
{
    io()->title('User Input Methods');

    io()->section('Ask');
    io()->ask('What is your name?');

    io()->section('AskHidden');
    io()->askHidden('What is your password?');

    io()->section('Confirm');
    io()->confirm('Are you sure?');

    io()->section('Choice');
    io()->choice(
        'Choose an option:',
        ['Option 1', 'Option 2', 'Option 3']
    );
    io()->comment('Choice with default value:');
    io()->choice(
        'Choose an option:',
        ['Option 1', 'Option 2', 'Option 3'],
        'Option 2'
    );
    io()->comment('Choice with default value and multi-select:');
    io()->choice(
        'Choose an option:',
        ['Option 1', 'Option 2', 'Option 3', 'Option 4', 'Option 5', 'Option 6'],
        'Option 5',
        multiSelect: true
    );
}

#[AsTask(description: 'Show "io()" result methods', namespace: 'test-io')]
function result(): void
{
    io()->title('Result Methods');

    io()->section('Success');
    io()->success('This is a success message.');
    io()->success(
        ['...', 'This is a multiline success message.', '...']
    );

    io()->section('Info');
    io()->info('This is an info message.');
    io()->info(
        ['...', 'This is a multiline info message.', '...']
    );

    io()->section('Warning');
    io()->warning('This is a warning message.');
    io()->warning(
        ['...', 'This is a multiline warning message.', '...']
    );

    io()->section('Error');
    io()->error('This is an error message.');
    io()->error(
        ['...', 'This is a multiline error message.', '...']
    );
}

// #[AsTask(description: 'Create a New User Account', namespace: 'test')]
// function createUserAccount(): void
// {
//     io()->title('User Account Creation');

//     io()->section('Enter User Details');
//     $username = io()->ask('Enter username:');
//     $email = io()->ask('Enter email address:');
//     $password = io()->askHidden('Enter password:');
//     $isActive = io()->confirm('Is the user active?');

//     io()->note("Processing account for user: $username");

//     sleep(2);
//     io()->success("User account for $username has been successfully created!");

//     io()->table(
//         ['Field', 'Value'],
//         [
//             ['Username', $username],
//             ['Email', $email],
//             ['Password', '********'],
//             ['Status', $isActive ? 'Active' : 'Inactive'],
//         ]
//     );
// }

// #[AsTask(description: 'Process Data and Display Results', namespace: 'test')]
// function processData(): void
// {
//     io()->title('Data Processing Task');
//     io()->section('Initialization');
//     io()->text('Preparing to process a batch of data...');
//     io()->comment('This process might take some time depending on the data size.');

//     $totalItems = 100;
//     $processedItems = 0;

//     io()->section('Processing Data');
//     io()->progressStart($totalItems);

//     for ($i = 0; $i < $totalItems; $i++) {
//         usleep(100000);

//         $processedItems++;
//         io()->progressAdvance();

//         if ($i % 25 === 0 && $i !== 0) {
//             io()->newline(2);
//             io()->warning("Processing slowdown observed at item $i.");
//         }
//     }

//     io()->progressFinish();

//     io()->section('Processing Summary');
//     $headers = ['Metric', 'Value'];
//     $rows = [
//         ['Total Items', $totalItems],
//         ['Processed Items', $processedItems],
//         ['Errors', 0],
//         ['Warnings', 1],
//     ];
//     io()->table($headers, $rows);

//     io()->success('Data processing completed successfully!');
//     io()->note('Ensure to review the warnings for potential issues.');
// }
