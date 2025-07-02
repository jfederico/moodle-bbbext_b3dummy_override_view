# b3dummy_override_view Extension Subplugin for BigBlueButtonBN

This extension subplugin for the BigBlueButtonBN Moodle activity module demonstrates how to override the default view page using the new extension and output override system.

## Features
- **View Page Override Only:**
  - Provides a custom implementation for the BigBlueButtonBN activity view page by supplying:
    - `/classes/output/view_page.php` that extends `\mod_bigbluebuttonbn\output\view_page`
    - `/templates/view_page.mustache` as the template for the custom view page

## How It Works
- The BigBlueButtonBN extension system will dynamically discover and use the first enabled subplugin that provides a `/classes/output/view_page.php` class extending the core view page.
- The custom `view_page.php` class should implement any custom logic needed for the view, and the corresponding `view_page.mustache` template will be used for rendering.
- No custom renderer or alternative view logic is provided or required in this subplugin.

## Example Structure
```
mod/bigbluebuttonbn/extension/b3dummy_override_view/
├── classes/
│   └── output/
│       └── view_page.php       # Extends \mod_bigbluebuttonbn\output\view_page
├── templates/
│   └── view_page.mustache      # Mustache template for the custom view page
└── README.md                   # This file
```

## Requirements
- BigBlueButtonBN for Moodle 5.1 or later with the extension system enabled.
- Moodle 5.1 or later.

## Author
Blindside Networks Inc

For more information, see the documentation in the main BigBlueButtonBN plugin or contact the maintainers.
