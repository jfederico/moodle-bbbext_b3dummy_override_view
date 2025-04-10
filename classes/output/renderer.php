<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

namespace bbbext_b3dummy_override_view\output;

use core\notification;
use core\output\inplace_editable;
use html_table;
use html_writer;
use plugin_renderer_base;

/**
 * Renderer for the mod_bigbluebuttonbn plugin.
 *
 * @package   bbbext_b3dummy_override_view
 * @copyright 2025 onwards, Blindside Networks Inc
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Jesus Federico  (jesus [at] blindsidenetworks [dt] com)
 */
class renderer extends plugin_renderer_base {
    /**
     * Render the view.
     *
     * @param view $page The renderable object.
     * @return string Rendered HTML.
     */
    public function render_view(view $page): string {
        return $this->render_from_template(
            'bbbext_b3dummy_override_view/view',
            $page->export_for_template($this)
        );
    }
}
