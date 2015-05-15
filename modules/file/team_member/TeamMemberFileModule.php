<?php
class TeamMemberFileModule extends FileModule {
	public function __construct($aRequestPath) {
		parent::__construct($aRequestPath);
	}

	public function renderFile() {
		$oTeamMember = TeamMemberQuery::create()->filterByOriginalId(Manager::usePath())->findOne();
		// absolute link!
		// if($oTeamMember)
	}
}