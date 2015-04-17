<?php

class ClassMaterialsOutput extends ClassOutput {
	public function __construct(NavigationItem $oNavigationItem, ClassesPageTypeModule $oPageType) {
		parent::__construct($oNavigationItem, $oPageType);
		$this->oClass = $this->oNavigationItem->getClass();
	}

	public function renderContent() {
		if(!$this->oClass) {
			return null;
		}
		$oTemplate = $this->oPageType->constructTemplate('document_list');
		$oDocumentPrototype = $this->oPageType->constructTemplate('document_list_item');
		foreach($this->oClass->getClassDocuments() as $oClassDocument) {
			$oItemTemplate = clone $oDocumentPrototype;
			$oItemTemplate->replaceIdentifier('name', $oClassDocument->getDocument()->getName());
			$oItemTemplate->replaceIdentifier('link', $oClassDocument->getDocument()->getDisplayUrl());
			if($oClassDocument->getDocument()->getDescription()) {
				$oItemTemplate->replaceIdentifier('description', $oClassDocument->getDocument()->getDescription());
			}
			$oTemplate->replaceIdentifierMultiple('items', $oItemTemplate);
		}
		return $oTemplate;

	}

	public function renderContext() {
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
}