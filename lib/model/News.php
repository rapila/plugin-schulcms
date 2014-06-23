<?php

/**
 * @package    propel.generator.model
 */
class News extends BaseNews
{
	/**
	* Sets the journal entry text. When given a TagParser or an HtmlTag instance, this method will use the first paragraph tag found to construct the synopsis (short text).
	* @param string|TagParser|HtmlTag $mText
	*/
	public function setBody($mText) {
		if($mText instanceof TagParser) {
			$mText = $mText->getTag();
		}
		if($mText instanceof HtmlTag) {
			$oTextShort = null;
			foreach($mText->getChildren() as $oChild) {
				if($oChild instanceof HtmlTag && strtolower($oChild->getName()) === 'p') {
					$oTextShort = $oChild;
					break;
				}
			}
			$mText = $mText->__toString();
			if($oTextShort) {
				$this->setBodyShort($oTextShort->__toString());
			} else {
				$this->setBodyShort($mText);
			}
		}
		parent::setBody($mText);
	}
	
}
