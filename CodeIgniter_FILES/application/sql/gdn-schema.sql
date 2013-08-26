/* ***********************************************************************
 * Created: 2013 Jul 14 05:45:11
 * Last Modified: 2013 Jul 15 12:49:46
 * License: see LICENSE.txt

   Copyright 2013 Antoine Patel
   Copyright 2013 Fatine Nakkoubi

   This file is part of FDV - Open Grades Manager.

   FDV - Open Grades Manager is free software: you can redistribute it
   and/or modify it under the terms of the GNU General Public License as
   published by the Free Software Foundation, either version 3 of the
   License, or (at your option) any later version.

   FDV - Open Grades Manager is distributed in the hope that it will be
   useful, but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   GNU General Public License for more details.

   You should have received a copy of the GNU General Public License
   along with FDV - Open Grades Manager. If not, see
   <http://www.gnu.org/licenses/>.

 *********************************************************************** */

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- TODO : prod.
DROP DATABASE IF EXISTS ci-gdn-dev;
CREATE DATABASE IF NOT EXISTS ci-gdn-dev;
USE ci-gdn-dev;

-- To prevent performance issues when using INFORMATION_SCHEMA with
-- InnoDB engine.
-- http://www.mysqlperformanceblog.com/2011/12/23/solving-
--                                  information_schema-slowness/
SET global innodb_stats_on_metadata=0;

DROP TABLE IF EXISTS
    -- employees,
    -- departments;

-- --------------------------------------------------------

