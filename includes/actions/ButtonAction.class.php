<?php
/** 
 * 实现按钮的类
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 * 
 * @file
 */

namespace PhpWget\UI;

use UI\{
    Window,
    Controls\Button,
    Controls\Entry
};

/**
 * @param string $text 按钮上显示的文本
 * @param Entry $entry Entry对象
 * @param Window $window Window对象
 * @param string $action 按钮动作（open或者save）
 */
class ButtonAction extends Button {
    private $entry;

    private $window;

    private $action;

    public function __construct(string $text, Entry $entry, Window $window, string $action) {
        parent::__construct( $text );

		$this->entry = $entry;
		$this->window = $window;
        $this->action = $action;
	}

    protected function onClick() {
        switch ( $this->action ) {
            case 'open':
                $file = $this->window->open();
                break;
            case 'save':
                $file = $this->window->save();
                break;
        }
        if ( $file ) {
			$this->entry->setText( $file );
		}
	}
}