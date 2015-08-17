<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1439836589.
 * Generated on 2015-08-17 20:36:29 by rafi
 */
class PropelMigration_1439836589
{

    public function preUp($manager)
    {
			require_once $_SERVER['PWD'].'/base/lib/inc.php';
			foreach(EventQuery::create()->find() as $oEvent) {
				$oEvent->setTitle($oEvent->getTitle());
				$oEvent->save();
			}
        // add the pre-migration code here
    }

    public function postUp($manager)
    {
        // add the post-migration code here
    }

    public function preDown($manager)
    {
        // add the pre-migration code here
    }

    public function postDown($manager)
    {
        // add the post-migration code here
    }

    /**
     * Get the SQL statements for the Up migration
     *
     * @return array list of the SQL strings to execute for the Up migration
     *               the keys being the datasources
     */
    public function getUpSQL()
    {
        return array (
  'rapila' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

CREATE UNIQUE INDEX `events_U_1` ON `events` (`slug`,`date_start`,`school_class_id`);

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

    /**
     * Get the SQL statements for the Down migration
     *
     * @return array list of the SQL strings to execute for the Down migration
     *               the keys being the datasources
     */
    public function getDownSQL()
    {
        return array (
  'rapila' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

DROP INDEX `events_U_1` ON `events`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}