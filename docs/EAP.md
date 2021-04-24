# EAP: Architecture Specification and Prototype

> Project vision

## A7: High-level architecture. Privileges. Web resources specification

In this artifact will be documented the architecture of the web application to develop, indicating the catalogue of resources and properties of each resource, including:
- References to the graphical interfaces
- The format of JSON responses.
In addition, this artifact will present the documentation for XEKKIT, including the following operations over data: *create*, *read*, *update* and *delete*.
This specification adheres to the OpenAPI standard using YAML.

### 1. Overview

The overview of the web application to implement will be presented in the *Overview* section. Here the modules will be identifier and briefly described. The web resources will be associated with each module and will be described in the individual documentation of each module.

| Modules | Description |
|-------- | ----------- |
| **M01: Authentication and Individual Profile** | Web resources associated with user authentication and individual profile management: login, logout, registration, password recovery, view and edit personal information. |
| **M02: Create/Edit Content** | Web resources associated with creation and edition of content.  |
| **M03: See Users/Content** | Web resources associated viewing news, comments and users. |
| **M04: Search Users/Content** | Web resources associated with searching news, comments and users. |
| **M05: Notifications** | Web resources associated with notifications, including viewing and deletion. |
| **M06: Create Requests** | Web resources associated with requests: partner request, ban user request, ban content request and unban appeal. |
| **M07: Moderator Administration** | Web resources associated with moderator management, specifically: acception/rejection of requests by the moderators. |
| **M08: Static Pages** | Web resources with static content are associated with this module: about and faq. |

### 2. Permissions 

This section defines the permissions used in the modules to establish the conditions of access to resources.

| ID | Name | Description |
| --- | --- | --- |
| **PUB** | Public | Users without privileges |
| **USR** | User | Authenticated users |
| **OWN** | Owner | Users that are authors of content |
| **BAN** | Banned | Banned users |
| **MOD** | Moderator | Moderators |

### 3. OpenAPI Specification

This section includes the completr API specification in OpenAPI (YAML).

OpenAPI YAML: https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/blob/master/xekkit/xekkit-api.yaml
OpenAPI Swagger: https://app.swaggerhub.com/apis/lbaw2114/lbaw-xekkit_web_api/1.0

```yaml
openapi: 3.0.0

info:
  version: '1.0'
  title: 'LBAW XEKKIT Web API'
  description: 'Web Resources Specification (A7) for XEKKIT'

servers:
  - description: 'Production server'
    url: http://lbaw2114-prod.fe.up.pt

externalDocs:
  description: Find more info here.
  url: https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/wikis/eap#a7-high-level-architecture-privileges-web-resources-specification
    
tags:
  - name: 'M01: Authentication and Individual Profile'
  - name: 'M02: Create/Edit Content'
  - name: 'M03: See Users/Content'
  - name: 'M04: Search Users/Content'
  - name: 'M05: Notifications'
  - name: 'M06: Create Requests'
  - name: 'M07: Moderator Administration'
  - name: 'M08: Static Pages'

paths:
  # -------------------- M01 --------------------  

  /login:
    get:
      operationId: R101
      summary: 'R101: Login Form'
      description: 'Provide login form. Access: PUB'
      tags:
        - 'M01: Authentication and Individual Profile'
      responses:
        '200':
          description: 'Ok. Show [UI07](hhttps://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/blob/eap/docs/A3.md#ui07:-log-in)'
    post:
      operationId: R102
      summary: 'R102: Login Action'
      description: 'Processes the login form submission. Access: PUB'
      tags:
        - 'M01: Authentication and Individual Profile'

      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              type: object
              properties:
                inputUsername:          
                  type: string
                inputPassword:  
                  type: string
              required:
                - inputUsername
                - inputPassword

      responses:
        '302':
          description: 'Redirect after processing the login credentials.'
          headers:
            Location:
              schema:
                type: string
              examples:
                302Success:
                  description: 'Successful authentication. Redirect to user profile.'
                  value: '/'
                302Error:
                  description: 'Failed authentication. Redirect to login form.'
                  value: '/login'

  /logout:
    post:
      operationId: R103
      summary: 'R103: Logout Action'
      description: 'Logout the current authenticated user. Access: USR, MOD, BAN'
      tags:
        - 'M01: Authentication and Individual Profile'

      responses:
        '302':
          description: 'Redirect after processing the logout.'
          headers:
            Location:
              schema:
                type: string
              examples:
                302Success:
                  description: 'Successful logout. Redirect to home page.'
                  value: '/'                            
                                
  /my-profile/password-recovery:
    get:
      operationId: R104
      summary: 'R104: Password Recovery Page'
      description: 'Password recovery page. Access: PUB'
      tags:
        - 'M01: Authentication and Individual Profile'
      responses:
        '200':
          description: 'Page to recovery password.'
              

    post:
      operationId: R105
      summary: 'R105: Password Recovery Action'
      description: 'Password recovery action. Access: PUB'
      tags:
        - 'M01: Authentication and Individual Profile'
      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              type: object
              properties:
                inputEmail:
                  type: string
              required:
                - inputEmail

      responses:
        '302':
          description: 'Redirect after processing the request.'
          headers:
            Location:
              schema:
                type: string
              examples:
                302Success:
                  description: 'Successful request password recorvery. Redirect to home page.'
                  value: '/login'
                  
  /register:
    get:
      operationId: R106
      summary: 'R106: Register Form'
      description: 'Provide new user registration form. Access: PUB'
      tags:
        - 'M01: Authentication and Individual Profile'
      responses:
        '200':
          description: 'Ok. Show [UI08](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/blob/eap/docs/A3.md#ui08:-sign-Up)'

    post:
      operationId: R107
      summary: 'R107: Register Action'
      description: 'Processes the new user registration form submission. Access: PUB'
      tags:
        - 'M01: Authentication and Individual Profile'

      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              type: object
              properties:
                inputUsername:
                  type: string
                inputEmail:
                  type: string
                inputPassword:
                  type: string
                inputConfirmPassword:
                  type: string
                inputBirthDate:
                  type: string
                inputGender:
                  type: string
              required:
                - inputUsername
                - inputEmail
                - inputPassword
                - inputConfirmPassword
                - inputBirthDate
                - inputGender

      responses:
        '302':
          description: 'Redirect after processing the new user information.'
          headers:
            Location:
              schema:
                type: string
              examples:
                302Success:
                  description: 'Successful authentication. Redirect to user profile.'
                  value: '/'
                302Failure:
                  description: 'Failed authentication. Redirect to login form.'
                  value: '/login'

  /my-profile/{username}:
    get:
      operationId: R108
      summary: 'R108: View user profile'
      description: 'Show the individual user profile. Access: USR'
      tags:
        - 'M01: Authentication and Individual Profile'

      parameters:
        - in: path
          name: username
          schema:
            type: string
          required: true

      responses:
        '200':
          description: 'Ok. Show [UI12](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/blob/eap/docs/A3.md#ui12-my-profile)'

  /my-profile/edit/{username}:
    get:
      operationId: R109'
      summary: 'R109: Edit user profile'
      description: 'Form to edit the individual user profile. Access: USR'
      tags:
        - 'M01: Authentication and Individual Profile'

      parameters:
        - in: path
          name: username
          schema:
            type: string
          required: true

      responses:
        '200':
          description: 'Ok. Show [UI13](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/blob/eap/docs/A3.md#ui13-edit-profile)'

    post:
        operationId: R110
        summary: 'R110: Edit Profile Action'
        description: 'Processes the edit user form submission. Access: USR'
        tags:
          - 'M01: Authentication and Individual Profile'
          
        parameters:
        - in: path
          name: username
          schema:
            type: string
          required: true

        requestBody:
          required: true
          content:
            application/x-www-form-urlencoded:
              schema:
                type: object
                properties:
                  username:
                    type: string
                  email:
                    type: string
                  birth_date:
                    type: string
                  gender:
                    type: string
                  description:
                    type: string
                required:
                  - username
                  - email
                  - birth_date
                  - gender

        responses:
          '302':
            description: 'Redirect after processing the edit user information.'
            headers:
              Location:
                schema:
                  type: string
                examples:
                  302Success:
                    description: 'Successful edit profile. Redirect to user profile.'
                    value: '/my-profile'
                  302Failure:
                    description: 'Failed edit profile. Redirect to user profile.'
                    value: '/my-profile'

  /my-profile/{username}/change-password:
    post:
      operationId: R111
      summary: 'R111: Change Password Action'
      description: 'Processes the change user password form submission. Access: USR'
      tags:
        - 'M01: Authentication and Individual Profile'
      
      parameters:
        - in: path
          name: username
          schema:
            type: string
          required: true

      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              type: object
              properties:
                old_password:
                  type: string
                  format: password
                confirm_password:
                  type: string
                  format: password
                new_password:
                  type: string
                  format: password
              required:
                - old_password
                - confirm_password
                - new_password

      responses:
        '302':
          description: 'Redirect to edit profile page after proessing.'
          headers:
            Location:
              schema:
                type: string
              examples:
                302Success:
                  description: 'Successful change password. Redirect to usert edit profile'
                  value: '/my-profile/edit'
                302Failure:
                  description: 'Failed to change password. Redirect to user edit profile'
                  value: '/my-profile/edit'
  
  # -------------------- M02 -------------------- 

  /news/create/{username}:
    post:
      operationId: R201
      summary: 'R201: Create news action'
      description: 'Create news content. Access: USR, MOD'
      tags:
        - 'M02: Create/Edit Content'
      responses:
        '302':
          description: 'Successful news creation Redirect to News content'
      
      parameters:
        - in: path
          name: username
          schema:
            type: string
          required: true

      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              type: object
              properties:
                title:
                  type: string
                body:
                  type: string
                image:
                  type: string
                  format: binary
              required:
                - title
                - body

  /comment/create/{username}:
    post:
      operationId: R202
      summary: 'R202: Create comment action'
      description: 'Create comment. Access: USR, MOD'
      tags:
        - 'M02: Create/Edit Content'
      responses:
        '302':
          description: 'Successful comment creation Redirect to news content'
      
      parameters:
        - in: path
          name: username
          schema:
            type: string
          required: true
      
      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              type: object
              properties:
                body:
                  type: string
                reply_to_id:
                  type: integer
              required:
                - body 

  /news/edit/{news_id}:
    post:
      operationId: R203
      summary: 'R203: Edit news action'
      description: 'Edit news content. Access: OWN'
      tags:
        - 'M02: Create/Edit Content'
      responses:
        '302':
          description: 'Successful news EDITION. Redirect to News content'
      
      parameters:
        - in: path
          name: news_id
          schema:
            type: integer
          required: true

      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              type: object
              properties:
                title:
                  type: string
                body:
                  type: string
                image:
                  type: string
                  format: binary
              required:
                - body
           
  /comment/edit/{comment_id}:
    post:
      operationId: R204
      summary: 'R204: Edit comment action'
      description: 'Edit Comment. Access: OWN'
      tags:
        - 'M02: Create/Edit Content'
      responses:
        '302':
          description: 'Successful comment edition Redirect to news content'
      
      parameters:
        - in: path
          name: comment_id
          schema:
            type: integer
          required: true
      
      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              type: object
              properties:
                body:
                  type: string
                reply_to_id:
                  type: integer
              required:
                - body 

  /news/delete/{news_id}:
    post:
      operationId: R205
      summary: 'R205: Delete News action'
      description: 'Delete News. Access: OWN'
      tags:
        - 'M02: Create/Edit Content'
      responses:
        '302':
          description: 'Successful news deletion. Redirect to homepage'
      parameters:
        - in: path
          name: news_id
          schema:
            type: integer
          required: true

  /comment/delete/{comment_id}:
    post:
      operationId: R206
      summary: 'R206: Delete comment action'
      description: 'Delete Comment. Access: OWN'
      tags:
        - 'M02: Create/Edit Content'
      responses:
        '302':
          description: 'Successful comment deletion. Redirect to homepage'
      parameters:
        - in: path
          name: comment_id
          schema:
            type: integer
          required: true  

  # -------------------- M03 -------------------- 

  /:
    get:
      operationId: R301
      summary: 'R301: Home page'
      description: 'Provide home page. Access: PUB, USR, MOD'
      tags:
        - 'M03: See Users/Content'
      responses:
        '200':
            description: 'Ok. IF PUB: Show [UI01](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/blob/eap/docs/A3.md#ui01:-main); ELSE: Show [UI02](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/blob/eap/docs/A3.md#ui02:-main-logged-in)'

  /news/{news_id}:
    get:
      operationId: R302
      summary: 'R302: View a Specific News Post.'
      description: 'Provide Specific News Post. Access: PUB, USR, OWN, MOD'
      tags:
        - 'M03: See Users/Content'
      responses:
        '200':
          description: 'Ok. Show [UI09](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/wikis/er#ui09-post)'
      parameters:
        - in: path
          name: news_id
          schema:
            type: integer
          required: true

  /profile/{username}:
    get:
      operationId: R303
      summary: "R303: View a User's profile."
      description: "Provide a User's Profile. Access: PUB, USR, MOD"
      tags:
        - 'M03: See Users/Content'
      responses:
        '200':
          description: 'Ok. Show [UI11](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/wikis/er#ui11-third-party-profile)'
      parameters:
        - in: path
          name: username
          schema:
            type: string
          required: true
  
  /vote/upvote/{content_id}:         
    post:
      operationId: R304
      summary: 'R304: Upvote Content'
      description: 'Upvote content. Access: USR, MOD'
      tags:
        - 'M03: See Users/Content'
      responses:
        '302':
           description: 'Successfully upvoted content. Redirect to news page'
      parameters:
        - in: path
          name: content_id
          schema:
            type: integer
          required: true

  /vote/downvote/{content_id}:         
    post:
      operationId: R305
      summary: 'R305: Downvote Content'
      description: 'Downvote content. Access: USR, MOD'
      tags:
        - 'M03: See Users/Content'
      responses:
        '302':
           description: 'Successfully downvoted content. Redirect to news page'
      parameters:
        - in: path
          name: content_id
          schema:
            type: integer
          required: true
  
  # -------------------- M04 -------------------- 
 
  /search/{search_string}:
    get:
      operationId: R401
      summary: 'R401: Search News and Users.'
      description: 'Provide News and Users Searched. Access: PUB, USR, OWN, MOD'
      tags:
        - 'M04: Search Users/Content'
      parameters:
        - in: path
          name: search_string
          schema:
            type: string
          required: true
      responses:
        '200':
          description: "Ok. Show [UI10](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/wikis/er#ui10-search)"

  # -------------------- M05 -------------------- 

  /notifications/{username}:
    get:
      operationId: R501
      summary: "R501: View User's Notification."
      description: "Provide User's Notifications. Access: OWN, MOD"
      tags:
        - 'M05: Notifications'
      responses:
        '200':
          description: 'Ok. Show [UI15](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/wikis/er#ui15-notifications)'
      parameters:
        - in: path
          name: username
          schema:
            type: string
          required: true
  
  # -------------------- M06 --------------------
  
  /request/report/content/{content_id}:         
    post:
      operationId: R601
      summary: "R601: Report content action"
      description: 'Report content. Access: USR, MOD'
      tags:
        - 'M06: Create Requests'
      responses:
        '302':
           description: 'Successfully reported content. Redirect to news page.'
      parameters:
        - in: path
          name: content_id
          schema:
            type: integer
          required: true

  /request/report/user/{user_id}:         
    post:
      operationId: R602
      summary: "R602: Report User action"
      description: 'Report User. Access: USR, MOD'
      tags:
        - 'M06: Create Requests'
      responses:
        '302':
           description: 'Successfully reported user. Redirect to user page.'
      parameters:
        - in: path
          name: user_id
          schema:
            type: integer
          required: true
  
  /request/partner_request/{username}:
    post:
      operationId: R603
      summary: "R603: Create partner request action"
      description: 'Create a partner request. Access: USR, MOD'
      tags:
        - 'M06: Create Requests'
      responses:
        '302':
          description: 'Successful partner request creation Redirect to User profile'
      
      parameters:
        - in: path
          name: username
          schema:
            type: string
          required: true

      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              type: object
              properties:
                reason:
                  type: string

              required:
                - reason

  /request/unban_appeal/{username}:
    post:
      operationId: R604
      summary: "R604: Create unban appeal action"
      description: 'Create unban appeal. Access: BAN'
      tags:
        - 'M06: Create Requests'
      responses:
        '302':
          description: 'Successful unban appeal creation Redirect to User profile'
      
      parameters:
        - in: path
          name: username
          schema:
            type: string
          required: true

      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              type: object
              properties:
                reason:
                  type: string

              required:
                - reason
  
  # -------------------- M07 --------------------

  /request/view/{username}:
    get:
      operationId: R701
      summary: "R701: View Requests."
      description: "Provide Requests. Access: MOD"
      tags:
        - 'M07: Moderator Administration'
      responses:
        '200':
          description: 'Ok. Show [UI16](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/wikis/er#ui16-moderator-options)'
      parameters:
        - in: path
          name: username
          schema:
            type: string
          required: true

  /request/accept/{request_id}:
    post:
      operationId: R702
      summary: "R702: Accept Request."
      description: 'Accept Request. Access: MOD'
      tags:
        - 'M07: Moderator Administration'
      responses:
        '302':
           description: 'Successfully accepted request. Redirect to requests page'
      parameters:
        - in: path
          name: request_id
          schema:
            type: integer
          required: true

  /request/reject/{request_id}:
    post:
      operationId: R703
      summary: "R703: Accept Request"
      description: 'Accept Request. Access: MOD'
      tags:
        - 'M07: Moderator Administration'
      responses:
        '302':
           description: 'Successfully rejected request. Redirect to requests page'
      parameters:
        - in: path
          name: request_id
          schema:
            type: integer
          required: true

  # -------------------- M08 --------------------

  /faq:
    get:
      operationId: R801
      summary: 'R801: FAQ'
      description: 'Frequent asked questions page. Access: PUB, USR, MOD'
      tags:
        - 'M08: Static Pages'

      responses:
        '200':
          description: 'Ok. IF PUB, USR Show [UI05](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/blob/eap/docs/A3.md#ui05-faq)
                            IF MOD Show [UI06](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/blob/eap/docs/A3.md#ui06-edit-faq-as-moderator'

  /about:
    get:
      operationId: R802
      summary: 'R802: About'
      description: 'About page. Access: PUB, USR, MOD'
      tags:
        - 'M08: Static Pages'

      responses:
        '200':
          description: 'Ok. Show [UI04](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/blob/eap/docs/A3.md#ui04-about)'

```


---


## A8: Vertical prototype

> Brief presentation of the artefact goals.

### 1. Implemented Features

#### 1.1. Implemented User Stories

> Identify the user stories that were implemented in the prototype.  

| User Story reference | Name                   | Priority                   | Description                   |
| -------------------- | ---------------------- | -------------------------- | ----------------------------- |
| US01                 | Name of the user story | Priority of the user story | Description of the user story |

...

#### 1.2. Implemented Web Resources

> Identify the web resources that were implemented in the prototype.  

> Module M01: Module Name  

| Web Resource Reference | URL                            |
| ---------------------- | ------------------------------ |
| R01: Web resource name | URL to access the web resource |

...

> Module M02: Module Name  

...

### 2. Prototype

> URL of the prototype plus user credentials necessary to test all features.  
> Link to the prototype source code in the group's git repository.  


---


## Revision history

Changes made to the first submission:
1. Item 1
1. ..

***
GROUP21gg, DD/MM/2021
 
* Group member 1 name, email (Editor)
* Group member 2 name, email
* ...