# Dirt Simple Blog

This is a very simple blog which has the following functionality:

* Ability to view a paginated list of posts.
* Ability to view posts individually.
* An Admin mode for editing and adding posts.
* An Admin login page.
* posts are made up of a Title, Summary and Body. 
* Unroutable requests default to a 404 error.
* Basic santisation and validation of post data.

## Setup

### Test Account

admin logon is
username - admin@blog.com
password - password

### Database

The schema is in mysql dump file in db/.

### Troubleshooting

* path is set to project being in www/blog/ dir
* AllowOverride All enabled for this .htaccess redirects - otherwise routing is broken.

### Todo

#### PDO
Implementation of PDO unavailable due to dev env woes, all DB functionality is contained within the Core Model.
There is scope to change the DB connection type, possibly with minor revisions to the Model queries.

#### Duplication of Queries
'get all' and 'find by id' queries could easily be contained within the core model and inherited.
 
