# b3dummy_override_view Extension Subplugin for BigBlueButtonBN

This extension subplugin for the BigBlueButtonBN Moodle activity module demonstrates how to extend the default view page using the new extension add-on system.

## Features
- Provide optional, pluggable view add-ons that the core view renders, without replacing the core view class or template.

## How It Works
- The BigBlueButtonBN extension system dynamically discovers add-on components implemented by subplugins under `classes/bigbluebuttonbn/view_page_addons/` with matching Mustache templates in `templates/`.
- Each add-on consists of a PHP class (extending the core view add-on base) and a same-named Mustache template to render its output.
- No custom renderer or replacement view class/template is required or used in this subplugin.

### Developer note: view add-on components
When extending the view, provide discrete "add-on" components that the core view will render. Implement both of the following with the same base name:

- A PHP class under `classes/bigbluebuttonbn/view_page_addons/view_page_addon.php` that extends the core view add-on base class (i.e., the core BigBlueButtonBN "view_page_addons" base). This class encapsulates the logic for your add-on block.
- A Mustache template under `templates/view_page_addon.mustache` with the exact same base name (case-insensitive match of `view_page_addon` → `view_page_addon.mustache`). This template renders the add-on's output.

Both the class and the template are required for the add-on to be discovered and rendered by the view override system.

## Example Structure
```
mod/bigbluebuttonbn/extension/b3dummy_override_view/
├── classes/
│   └── bigbluebuttonbn/
│       └── view_page_addons/
│           └── view_page_addon.php   # Extends the core view add-on base class
├── templates/
│   └── view_page_addon.mustache      # Mustache template for the add-on (name matches class)
└── README.md                   # This file
```

## Requirements
- BigBlueButtonBN for Moodle 5.1 or later with the extension system enabled.
- Moodle 5.1 or later.
