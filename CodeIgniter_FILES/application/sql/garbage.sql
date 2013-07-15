/* ***********************************************************************
 * Created: 2013 Jul 14 05:44:52
 * Last Modified: 2013 Jul 15 12:48:24
 * License: see LICENSE.txt

   Copyright 2013 Antoine Patel

   This file is part of FDV - Open Grades Manager.

   FDV - Open Grades Manager is free software: you can redistribute it
   and/or modify it under the terms of the GNU General Public License as
   published by the Free Software Foundation, either version 3 of the
   License, or ( at your option ) any later version.

   FDV - Open Grades Manager is distributed in the hope that it will be
   useful, but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   GNU General Public License for more details.

   You should have received a copy of the GNU General Public License
   along with FDV - Open Grades Manager. If not, see
   <http://www.gnu.org/licenses/>.

 *********************************************************************** */

-- // From tank_auth library.
users :
    `id` -> PK
    `username`
    `password`
    `email`
    `activated`
    `banned`
    `ban_reason`
    `new_password_key`
    `new_password_requested`
    `new_email`
    `new_email_key`
    `last_ip`
    `last_login`
    `created` -- // Date
    `modified` -- // Date

-- // Fields common to users, teachers and students.
people_infos :
    `people_id` -> FK
    `first_name`
    `last_name`
    -- // Mr., Mme, etc.
    `title`
    -- // Potentially visible to others.
    `contact_email`
    -- // File upload.
    `photo_file_path`
    `website`
    -- // *User defined* status.
    `comments_group_id`

user_infos :
    `user_id` -> FK
    -- // Admin, lambda_user
    `app_title`
    -- // computer scientist, secretary...
    `profession`

user_config :
    `user_id` -> FK
    `show_email`
    -- TODO : sort orders...

modifications :
    `id` -> PK
    `userId` -> FK
    `table_name`
    `column_name`
    `rowId`
    `value`
    -- // Users can add comments to their modifications.
    `comments_group_id`
    `date`

comments :
    `id` -> PK
    `from_user_id` -> FK
    `to_user_id` -> FK
    -- // A comment belongs to one group maximum ( one to many ).
    `group_id`
    `created_date`
    `content`

-- // Various files to complete information on tables when needed.
attachments :
    `id` -> PK
    `user_id` -> FK
    `name`
    `description`
    `created_date`
    `file_path`
    -- // `mime_type` : CodeIgniter might already deal with mime types.

diplomas-attachments :
    `diploma_id` -> FK
    `attachment_id` -> FK

people-attachments :
    `student_id` -> FK
    `attachment_id` -> FK

courses-attachments :
    `courses_id` -> FK
    `attachment_id` -> FK

student_groups-attachments :
    `student_group_id` -> FK
    `attachment_id` -> FK

teacher-attachments :
    `teacher_id` -> FK
    `attachment_id` -> FK

grades-attachments :
    `grades_id` -> FK
    `attachment_id` -> FK

comments-attachments :
    `comments_id` -> FK
    `attachment_id` -> FK

students :
    -- // Student number or INSEE number...
    `id` -> PK
    `firstName`
    `lastName`
    `diploma`
    `diploma_year`
    `diploma_semester`
    -- // `courses_group_id`
    `student_group_id` -> FK
    `modification_id` -> FK
    `comments_group_id` -> FK

-- // View on students where diploma_year = <now>.
current_students :
    `user_id` -> FK

diploma :
    `id` -> PK
    `name`
    `short_name`
    `year`
    `comments_group_id` -> FK

-- // View on diplomas where diploma_year = <now>.
current_diplomas :
    `diploma_id` -> FK

people-diplomas :
    `people_id` -> FK
    `diploma_id` -> FK

courses :
    `id` -> PK
    `name`
    `short_name`
    `comments_group_id`

courses_columns :
    `id` -> PK
    `weight`
    -- // 'Tooltip name'
    `name`
    -- // Displayed name.
    `shortname`
    `description`

courses-diplomas :
    `course_id` -> FK
    `diploma_id` -> FK

-- // Here these groups correspond to something meaningful : students
-- // can for instance be splitted into practical work groups ( grpA,
-- // grpB etc... ).
student_groups :
    `id` -> PK
    `course_id` -> FK
    `name`
    `description`
    -- // Wether it is the default group ( with all students of the
    -- // course ), or a 'real' one.
    -- // The default group should be automatically created.
    `default`
    `comments_group_id` -> FK

people-users :
    `people_id` -> FK
    `user_id` -> FK

people-teachers:
    `people_id` -> FK
    `teacher_id` -> FK

people-students:
    `people_id` -> FK
    `student_id` -> FK

people :
    `people_id` -> PK
    -- // TODO stats like number of people watching it, profile hits...

people_groups :
    `id` -> PK
    `name`
    `short_name`

-- // A user can define a custom group of people to watch their activity.
users-people_groups :
    `user_id` -> FK
    `people_group_id` -> FK

-- // A custom group of student_groups, much like user_people_groups.
users-student_groups :
    -- `id` -> PK
    `user_id` -> FK
    `student_groups_id` -> FK
    `name`
    `short_name`
    -- // /!\ PK( user_id, student_groups_id ) for 2NF.

students-student_groups :
    `student_group_id` -> FK
    `student_id` -> FK

-- // ---------------------
-- // TODO
teachers :
    `id` -> PK

teacher-user :
    `teacher_id` -> FK
    -- // May be NULL if it's not a registered user.
    `user_id` -> FK
-- // ---------------------

-- // More than one teacher for a student group.
-- // Links teachers to student groups.
teachers-student_groups :
    `student_group_id` -> FK
    `student_id` -> FK

grades :
    `user_id` -> PK
    -- // May be NULL if it's not a registered user.
    `student_id` -> FK
    `student_group_id` -> FK
    `courses_column_id` -> FK
    -- // 15.5. Negative numbers for unexcused absence and such ?
    `value`
    -- // 20.0
    `out_of`
    `date_created`
    `date_modified`
    -- // PK( user_id, student_id, student_group_id, courses_column_id ).

-- // Users can create shortcuts ( html links ) to some pages of the app.
-- // Can be a URI ( URL ) to a user-peoples page for instance.
-- // Intended to be displayed in a vertical toolbar or such.
quick_links :
    `id` -> PK
    `user_id` -> FK
     -- // The icon to display, choosed by the user.
    `icon`
    -- // If the icon is on top / left ( order = 0 ) of the toolbar etc.
    `order`
    `name`
    `description`
    `Tooltip`
    `uri`


-- /* */
-- /**********************************************************************
-- *  TODOs                                                              *
-- ***********************************************************************/
-- /* */

-- // Set cron like rule to recreate some diploma every year.
-- // TODO
-- diploma_renew :
    -- `diploma_id` -> FK
    -- `name`
    -- `short_name`
    -- `year`

-- // --
-- // Rules : the rights of a user ( edit all, juste some course ...? ).
-- // --

-- // --
-- // Rules to automatically delete some data, especially quick_links :
-- // user choose the expiration_date.
-- // Rules to automatically open courses etc. each year.
-- // --

-- // --
-- // Notifications system, for example when someone reply to a comment :
-- // its author should have the choice to receive a notification.
-- // --

