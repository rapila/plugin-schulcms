<?php

class ClassDocumentsOutput extends ClassOutput {
	public function __construct(NavigationItem $oNavigationItem, ClassesPageTypeModule $oPageType) {
		parent::__construct($oNavigationItem, $oPageType);
	}

	public function renderContent() {
		$this->oClass = $this->oNavigationItem->getClass();
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
		return " ";
	}
}