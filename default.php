<?php
/**
 * @package   OSCampus
 * @contact   www.joomlashack.com, help@joomlashack.com
 * @copyright 2016-2024 Joomlashack.com. All rights reserved
 * @license   https://www.gnu.org/licenses/gpl.html GNU/GPL
 *
 * This file is part of OSCampus.
 *
 * OSCampus is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * (at your option) any later version.
 *
 * OSCampus is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with OSCampus.  If not, see <https://www.gnu.org/licenses/>.
 */

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Oscampus\Module\Search;
use Oscampus\RouteFinder;

defined('_JEXEC') or die();

/** @var Search $this */

$actionUrl = Route::_(RouteFinder::getInstance()->get('search'));

$textValue = htmlspecialchars($this->getState('filter.text', ''));
$textClass = $this->getStateClass($textValue);

$advancedToggle  = $this->id . '-toggle';
$advancedContent = $this->id . '-advanced';
$advancedVisible = $this->getState('show.types')
    || array_filter(
        array_diff_key(
            $this->model->getActiveFilters(),
            ['text' => null]
        )
    );

HTMLHelper::_('osc.sliders', '#' . $advancedToggle, $advancedVisible);

?>
<div class="osc-module-container osc-module-search">
    <form name="oscampusFilter"
          id="<?php echo $this->id; ?>"
          method="get"
          action="<?php echo $actionUrl; ?>">

        <input name="text"
               type="text"
              placeholder="Search"
               value="<?php echo $textValue; ?>"
               class="<?php echo $textClass; ?>"/>

        
        
            <div>
                <button type="submit">Search</button>
            </div>
    </form>
</div>
