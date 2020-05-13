**⚠️ Please do not fork this repository, it will make it easy for other candidates to find your solution! ⚠️**

# The Challenge
Given the attached schema, feel free to edit the schema as you see fit for the purposes of this exercise.
The schema represents EPG (Electronic Program Guide) data for channels.

Provided is a script that imports EPG data from the provided XML into the database models. The script is deeply flawed, even containing some bugs.
Your task is refactor or rewrite the importer script into something you consider good quality. We particularly consider maintainability, reusability and cognitivie complexity in our assessment of the assignment.

Consider how your code is reusable if, for example, the data source or format changes, or the data sink is changed.

It is up to you how much you want to do. If there are features or improvements you leave out, don't hesitate to tell us when you hand in the assignment. We look for quality, not quantity, so don't over-engineer it.

# Note

* There is a docker environment ready for you, that will run the database and provides an environment in which to run the script. Focus on PHP code for this assignment, don't bother too much with infrastructure details.
* The database container has no persistence configured. This means that if you `down` and then `up` the container again, it will be reset to its initial state.
* There could be missing fields in the provider’s data. Not all providers have complete EPG fields. Some providers have only basic EPG data while others have enriched EPG data. If a field is not found in the XML, please skip it.
* Note that only channels that exist in the database should have their schedules should be imported.
* Attached file descriptions
    
    * *epg_schema.sql* contains the schema for the EPG tables. Also has data for the channels we’re interested in.

    * *xml_descr.png* shows nodes of interest in the xml file
 
    * *egp.xml.zip* is the provider’s xml for EPG data
 
 ## How to run script

1. Initialize the docker containers and start the DB

        docker-compose up -d

2. Install the schema into the database. Note you may need to wait for a while for the mysql service to become available.

        docker-compose exec ws-database sh -c 'mysql -Dws-import -phunter2 < /epg_schema.sql'

2. Start a shell in the php-cli container, first time it takes a while for it to build the image.

        docker-compose run ws-import bash
    
3. Run the script

        php /code/src/ws-import.php
