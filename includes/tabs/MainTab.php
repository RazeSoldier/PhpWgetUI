<?php
/** 
 * 首页 
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
    Controls\Form,
    Controls\Group,
    Controls\Box,
    Controls\Label,
    Controls\Separator,
    Controls\Entry,
    Controls\Grid
};

class MainTab extends PhpWgetTab {
    /**
     * @var object 存储UI\Controls\Box对象
     */
    private $mainTabBox;

    /**
     * @var object 存储UI\Controls\Group对象
     */
    private $downloadFormGroup;

    /**
     * @var object 存储UI\Controls\Form对象
     */
    private $downloadForm;

    public function __construct() {
        parent::__construct();
        
        $this->mainTabBox = new Box( Box::Vertical );
        $this->downloadFormGroup = new Group( '下载' );
        $this->downloadFormGroup->setMargin( true );
        $this->downloadForm = new Form();
        $this->downloadForm->setPadded( true );
    }

    public function show() : Box {
        $this->mainTabBox->append(
            new Label( '本软件是PhpWget的可视化版本' )
        );
        $this->mainTabBox->append( new Separator( Separator::Horizontal ) );

        $this->mainTabBox->append( $this->downloadFormGroup, true );

        $this->downloadForm->append( 'URL' , new Entry( Entry::Normal ), false );

        $openEntry  = new Entry();
        $openEntry->setReadOnly( true );
        $openButton = new ButtonAction( '选择文件', $openEntry, $this->windowObj, 'open' );

        $filesGrid = new Grid();
        $filesGrid->setPadded( true );
        $filesGrid->append( $openButton, 0, 0, 1, 1, 
            false, Grid::Fill, false, Grid::Fill);
        $filesGrid->append( $openEntry, 1, 0, 1, 1, 
            true, Grid::Fill, false, Grid::Fill);
        $this->downloadForm->append( '下载到', $filesGrid, false);

        $this->downloadFormGroup->append( $this->downloadForm );

        return $this->mainTabBox;
    }
}