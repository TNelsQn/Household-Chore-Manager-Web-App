
THE CHOREINATOR

MOTIVATION:

Basic aim was to create a chore managing application for members of a household to use
to fairly distribute household chores.

FEATURES:

LOGIN/REGISTER PAGES:

users can register for an account by providing a username, email and password.  There are
additional code in the login/register pages which provides a better user experience.

For example, javascript is used to notify the user if their password and confirmed password
dont match when registering an account.  It is also used to prevent the login/register form
being submit with empty text fields.

A popup box will appear if the users username/password do not match any in the current database.

EXTRA FEATURE:

A password reset feature was added in the event the forget their password, this will prompt the
user to enter their email and they will be sent password change code to that email.  This code
can be used to change their password.


ADDING CHORES:

Any user can add a chore to the current rotation.  This chore will be assigned to the user who has the 
least number of tasks to do for that particular week, this includes not only number of chores but the 
frequency of these chores as well.  If all the users have the same number of active tasks a random
user will be selected and assigned the task.

For example, if user a A had two active tasks that needed to be completed 4 times and 3 times a week 
respectively.  And user B had 4 active taks that only had to be completed once a week user B would have 
the smaller number of actual tasks to do so would be assigned the next task if it was added.

This seemed to be the faires way of assigning tasks to the users as it ensures everyone will evetually
have a balanced amout of work to do.

VIEWING/COMPLETING TASKS:

Each user has a task manager in their home page, this will show all their weekly tasks. It will also
show the number of times that task has bee completed and the number of days till it is due.

Users can tick of tasks from their task manager when they complete them, if they have finished their
assigned quota for that task that week then it will be crossd off and removed from the active chore
list.

If a chore is overdue (past is deadline) then it will appear red, notifying the user to complete it.

Javascript is used to view the descsription of the chores.  If the user hovers their mouse over one 
of their assigned chores it will display the description of that chore uderneath.

RESETTING CHORES:

At the end of the week completed chores are reset to allow the user complete them for the coming week.


ADDITIONAL FEATURES:

RATING CHORES:

This tab allows users to rate each others chores.  They can provide a rating out of 5.  This allows
users to check up on each other and ensure they are all putting in enough work.

SECURITY:

All the pages are secure being acessed without beign logged in, if a user tries to access the index.php
page for example without being logged in they will just be returned to the login page.

All user inputs are sanitised using a securiy.php file, the sqlite queries are also protected using 
bindValue().



