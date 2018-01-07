<?php
/** 
 * 设置页面
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

use UI\Controls\Group;
use UI\Controls\Box;
use UI\Controls\Progress;
use UI\Controls\Spin;
use UI\Controls\Slider;
use UI\Controls\Combo;
use UI\Controls\EditableCombo;
use UI\Controls\Radio;

$numbersHbox = new Box(Box::Horizontal);
$numbersHbox->setPadded(true);

$numbersGroup = new Group("Numbers");
$numbersGroup->setMargin(true);

$numbersHbox->append($numbersGroup, true);

$numbersVbox = new Box(Box::Vertical);
$numbersVbox->setPadded(true);

$numbersGroup->append($numbersVbox);

$progress = new Progress();

$spin = new class(0, 100) extends Spin {

	public function setSlider(Slider $slider) {
		$this->slider = $slider;
	}

	public function setProgress(Progress $progress) {
		$this->progress = $progress;	
	}

	protected function onChange() {
		$this->slider->setValue($this->getValue());
		$this->progress->setValue($this->getValue());
	}

	private $slider;
	private $progress;
};
$spin->setProgress($progress);

$slider = new class(0, 100) extends Slider {
	public function setSpin(Spin $spin) {
		$this->spin = $spin;
	}

	public function setProgress(Progress $progress) {
		$this->progress = $progress;
	}

	protected function onChange() {
		$this->spin->setValue($this->getValue());
		$this->progress->setValue($this->getValue());
	}

	private $spin;
	private $progress;
};

$slider->setProgress($progress);

$slider->setSpin($spin);
$spin->setSlider($slider);

$numbersVbox->append($spin);

$numbersVbox->append($slider);
$numbersVbox->append($progress);

$ip = new Progress();
$ip->setValue(-1);
$numbersVbox->append($ip);

$listsGroup = new Group("Lists");
$listsGroup->setMargin(true);
$numbersHbox->append($listsGroup);

$otherBox = new Box(Box::Vertical);
$otherBox->setPadded(true);
$listsGroup->append($otherBox);

$combo = new Combo();
$combo->append("Item 1");
$combo->append("Item 2");
$combo->append("Item 3");
$otherBox->append($combo);

$ecombo = new EditableCombo();
$ecombo->append("Editable Item 1");
$ecombo->append("Editable Item 2");
$ecombo->append("Editable Item 3");
$otherBox->append($ecombo);

$radio = new Radio();
$radio->append("Radio Button 1");
$radio->append("Radio Button 2");
$radio->append("Radio Button 3");
$otherBox->append($radio);

$tab->append("设置", $numbersHbox);
$tab->setMargin(1, true);