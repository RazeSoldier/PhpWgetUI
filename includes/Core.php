<?php
/** 
 * 核心文件
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

use UI;
use UI\{
    Size,
    Window,
    Controls\Tab
};

/**
 * @class 程序内核
 */
class Core {
    /**
     * @var object 存储Window对象
     */
    protected $windowObj;

    /**
     * @var object 存储Tab对象
     */
    protected $tabObj;

    public function __construct() {
        $this->windowObj = new Window( APP_NAME, new Size(640, 480), true );
        $this->windowObj->setMargin(true);
        $this->tabObj = new Tab();
    }

    /**
     * 加载必要的文件
     */
    public function bootstrap() {
        require_once APP_PATH . '/includes/PhpWgetTab.class.php';
        require_once APP_PATH . '/includes/tabs/MainTab.php';
        require_once APP_PATH . '/includes/actions/ButtonAction.class.php';
        //require_once APP_PATH . '/includes/tabs/SettingTab.php';
    }

    public function run() {
        $this->windowObj->add($this->tabObj);
        $mainTab = new MainTab();
        $this->tabObj->append( "下载页", $mainTab->show() );
        $this->tabObj->setMargin(0, true);
 
        $this->finalRun();
    }

    private function finalRun() {
        $this->windowObj->show();
        UI\run();
    }
}