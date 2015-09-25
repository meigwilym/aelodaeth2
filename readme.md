## Aelodaeth

### Track an organization's members and subscription payments

Originally built with CodeIgniter, I was recently inspired to rebuild this app as a learning experience. 

I watched Adam Wathan's excellent 'Chasing "Perfect"' at Laracon EU 2015. 

The simplicity of his approach to program design and testing struck a chord with me. I then sat down and tried a similar approach to the design of this rebuild. 

You can read my development notes in the `./dev-notes-models.txt` file. 

#### Original Version

This was originally part of a much larger CMS built on CodeIgniter for my local rugby club. 

Users could join online and pay using GoCardless. Admins could then log in and see who was up to date, and mark members with new payments etc. 

Parts of the original code is available at [meigwilym/aelodaeth](http://github.com/meigwilym/aelodaeth). 

### Roadmap 

Figure out business logic of how members join and pay for their subscription. 

Model the business logic in code and the database. 

Write the tests to validate the domain model. 

Create forms and controllers. Integrate with the app model. 

User Authentication, and a nice Bootstrap admin theme. 

Front End bells and whistles: pie charts, reports etc. 