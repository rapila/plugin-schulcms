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
		foreach($this->oClass->getClassLinks() as $oClassLink) {
			$oItemTemplate = clone $oLinkPrototype;
			$oItemTemplate->replaceIdentifier('name', $oClassLink->getLink()->getName());
			$oItemTemplate->replaceIdentifier('link', $oClassLink->getLink()->getUrl());
			if($oClassLink->getLink()->getDescription()) {
				$oItemTemplate->replaceIdentifier('description', $oClassLink->getLink()->getDescription());
			}
			$oTemplate->replaceIdentifierMultiple('items', $oItemTemplate);
		}
		return $oTemplate;

	}

	public function renderContext() {
		return " ";
	}
}