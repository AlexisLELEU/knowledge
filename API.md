# DOCUMENTATION API CRM KNOWLEDGE

* /GET
  - URL : http://your-url/:table
    - Return all content on this particular table into DB. (JSON FORMAT)
  - URL : http://your-url/:table/:id
    - Return particular only if id exist in DB (JSON FORMAT)
* /POST
  - URL : http://your-url/:table
    - Put data into DB (format accept : string). 
* /PUT 
  - URL : http://your-url/:table/:id
    - Update data only if id exist in DB (format accept : string)
* /DELETE 
  - URL : http://your-url/:table/:id
    - Delete data only if id exist in DB. 