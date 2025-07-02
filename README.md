# b3dummy_override_view Extension Subplugin for BigBlueButtonBN

This is a sample extension subplugin for the BigBlueButtonBN Moodle activity module. It demonstrates how to override the default view page and rendering logic using the new extension and output override system.

## Features
- **View Page Override:**
  - Provides a custom implementation for the BigBlueButtonBN activity view page.
  - You can override the default view by adding a class at `/classes/output/view_page.php` that extends `\mod_bigbluebuttonbn\output\view_page`.
  - Alternatively, you can implement a custom page with a different name by providing:
    - `/classes/output/view.php` (implements `renderable` and `templatable`)
    - `/templates/view.mustache` (the template for your custom view)
    - `/classes/output/renderer.php` that extends `\mod_bigbluebuttonbn\output\renderer` and renders your custom view.

## How It Works
- The BigBlueButtonBN extension system will dynamically discover and use the first enabled subplugin that provides a suitable override for the view page or renderer.
- If your subplugin provides `/classes/output/view_page.php` that extends the core view page, it will be used as the override.
- If you provide a custom view class and renderer, ensure your renderer extends the core renderer and implements the necessary render methods for your custom view.

## Example Structure
```
mod/bigbluebuttonbn/extension/b3dummy_override_view/
├── classes/
│   └── output/
│       ├── view.php            # Implements renderable, templatable (custom view)
│       ├── view_page.php       # (Optional) Extends \mod_bigbluebuttonbn\output\view_page
│       └── renderer.php        # (Optional) Extends \mod_bigbluebuttonbn\output\renderer
├── templates/
│   └── view.mustache           # Mustache template for the custom view
└── README.md                   # This file
```

## Requirements
- BigBlueButtonBN 3.0 or later with the extension system enabled.
- Moodle 4.0 or later.

## Author
Blindside Networks Inc

For more information, see the documentation in the main BigBlueButtonBN plugin or contact the maintainers.
