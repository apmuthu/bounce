================================================
=========    Introduction               ========
================================================


Thank you for downloading PHPBounce beta 0.9.9.e
We have fixed things with this realease.
Updates:

1. Ticketing system updated. Closed tickets are sealed and cannot be changed. Notes include time and date in familiar format.

2. Page formatting enhancements and uniformity across the platform.

3. Tiered Security for Admin / Manager / Users. Users cannot perform certain functions like delete a client, or edit client information. 
Reports are also restricted to Admin / Manager access, and customer logon information. Only pw reset available to users.

4. Email functionality is minimal, next realease will have email notifications to clients / users / managers.

5. Timesheets are fully functional. A User or Admin / Manager can add entries to his/her timesheet. 
When the week is over, you can submit the timesheet for approval. The timsheet will be flagged as Pending at which point it will not be editable, only admin / managers can approve timesheets.
Once a timesheet has been approved, it is locked and cannot be deleted or edited. 
Admin's will have a Timesheet dashboard under User Reports to see pending timesheets. They can also see anyone's timesheet for the last 365 days. 
Timesheets remain in database after 365 days, but are not visible in User Reports.





PHPBounce is a BILLING / TIMESHEET / TICKETING SYSTEM and has nothing to do with "Php Bounce" (Php Bounce Mail Handler).

PHPBounce beta is currently in beta as the name says. It's an ongoing project that will continue to evolve. We have integrated 
features as the project has evolved. Some of the major features include custom logo's and google checkout merchant integration 
to allow customers to pay with their google wallet account (credit cards ...)


================================================
====      Getting Started                =======
================================================

To install PHPBounce, extract the .zip file to a folder on your computer. 
Upload the files to your webserver.
Change the permissions to full read write for the connect.php file in the main folder of PHPBounce, you can change them back when you are done.
Run the installer program under the installer folder (http://mysite.com/bounce/installer/)
Follow the instructions for your database, the installer will do the rest.
Passwords are stored as MD5 hash.

You can change the logo to your own custom logo in the images folder. Look for logo_small.gif and logo_small.png





That's IT!

