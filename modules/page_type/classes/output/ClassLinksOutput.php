<?php

class ClassLinksOutput extends ClassOutput {
	public function __construct(NavigationItem $oNavigationItem, ClassesPageTypeModule $oPageType) {
		parent::__construct($oNavigationItem, $oPageType);
	}

	public function renderContent() {
		$this->oClass = $this->oNavigationItem->getClass();
		if(!$this->oClass) {
			return null;
		}
		$oTemplate = $this->oPageType->constructTemplate('link_list');
		$oLinkPrototype = $this->oPageType->constructTemplate('link_list_item');
		foreach($this->oClass->getClassLinksOrdered() as $oLink) {
			$oItemTemplate = clone $oLinkPrototype;
			$oItemTemplate->replaceIdentifier('name', $oLink->getName());
			$oItemTemplate->replaceIdentifier('link', $oLink->getUrl());
			if($oLink->getDescription()) {
				$oItemTemplate->replaceIdentifier('description', $oLink->getDescription());
			}
			$oTemplate->replaceIdentifierMultiple('items', $oItemTemplate);
		}
		return $oTemplate;

	}

	public function renderContext() {
		return " ";
	}
}