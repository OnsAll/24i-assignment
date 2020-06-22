# Analysis
The first thing that comes to my mind when I read the script is how to reduce the loops and the communication to the database, and also to convert the code to oriented object.

# Solution
*  Instead of checking the existing channel from the database for every loop , I fetch them all in one time and loop over it.
* Searching the events that belongs to the channel using XPATH which is faster so it does not matter where are the events located in the xml, it won't affect if the structure is changed if so we can just change the xpath query.
* Add models and PDOManager for code quality and reusability.
* It is obvious that the channel and schedules have `1 to many` relation so it should accept duplicated events in different channels so I have remove the UNIQUE in the `ext_schedule_id` of the schedule