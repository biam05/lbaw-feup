# EAP: Architecture Specification and Prototype

This project intends to build a Collaborative news website, where anyone can read, publish news and share them with friends, while avoiding the spread of fake news.

## A7: High-level architecture. Privileges. Web resources specification

In this artifact will be documented the architecture of the web application to develop, indicating the catalogue of resources and properties of each resource, including:
- References to the graphical interfaces
- The format of JSON responses.
In addition, this artifact will present the documentation for XEKKIT, including the following operations over data: *create*, *read*, *update* and *delete*.
This specification adheres to the OpenAPI standard using YAML.

### 1. Overview

The overview of the web application to implement will be presented in this section. Here the modules will be identified and briefly described. The web resources will be associated with each module and will be described in the individual documentation of each module.

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

OpenAPI YAML: https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/blob/a8/xekkit/a7_openapi.yaml
OpenAPI Swagger: https://app.swaggerhub.com/apis/lbaw2114/lbaw-xekkit_web_api/1.0

```yaml
openapi: 3.0.0

info:
  version: '1.0'
  title: 'LBAW XEKKIT Web API'
  description: 'Web Resources Specification (A7) for XEKKIT'

servers:
  - description: 'Production server'
    url: http://lbaw2114.lbaw-prod.fe.up.pt/

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

  /login/:
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
        '303':
          description: 'Redirect after login.'
          headers:
            Location:
              schema:
                type: string
              examples:
                303Success:
                  description: 'Ok. Redirect to [UI02](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/wikis/er#ui02-main-logged-in)'
                  value: '/'
                303Error:
                  description: 'Failed authentication. Redirect to login form.'
                  value: '/login/'
                

  /logout/:
    post:
      operationId: R103
      summary: 'R103: Logout Action'
      description: 'Logout the current authenticated user. Access: USR, MOD, BAN'
      tags:
        - 'M01: Authentication and Individual Profile'

      responses:
        '303':
          description: 'Redirect after processing the logout.'
          headers:
            Location:
              schema:
                type: string
              examples:
                303Success:
                  description: 'Ok. Redirect to [US01](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/wikis/er#ui01-main).'
                  value: '/'
                303Error:
                  description: 'Failed logout. Redirect to main page.'
                  value: '/'

                                
  /password-recovery/:
    post:
      operationId: R104
      summary: 'R104: Password Recovery Action'
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
        '303':
          description: 'Successful request password recorvery. Redirect to login.'
          headers:
            Location:
              schema:
                type: string
              examples:
                303Success:
                  description: 'Ok. Redirect to [US07](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/wikis/er#ui07-log-in).'
                  value: '/login/'
                303Error:
                  description: 'Failed password recovery. Redirect to login.'
                  value: '/login/'
                  
                  
  /register/:
    get:
      operationId: R105
      summary: 'R105: See Register Form'
      description: 'Provide new user registration form. Access: PUB'
      tags:
        - 'M01: Authentication and Individual Profile'
      responses:
        '200':
          description: 'Ok. Show [UI08](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/blob/eap/docs/A3.md#ui08:-sign-Up)'

    post:
      operationId: R106
      summary: 'R106: Register Action'
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
                inputBirthDate:
                  type: string
                inputGender:
                  type: string
              required:
                - inputUsername
                - inputEmail
                - inputPassword
                - inputBirthDate
                - inputGender

      responses:
        '303':
          description: 'Redirect after register new user.'
          headers:
            Location:
              schema:
                type: string
              examples:
                303Success:
                  description: 'Ok. Redirect to [UI02](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/wikis/er#ui02-main-logged-in)'
                  value: '/'
                303Error:
                  description: 'Failed register. Redirect to register.'
                  value: '/register/'


  /users/{username}/edit/:
    get:
      operationId: R107'
      summary: 'R107: Edit User Profile Form'
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
          content:
            application/json:
              schema:
                $ref: '#/components/schemas/UserEdit'

    patch:
      operationId: R108
      summary: 'R108: Edit User Profile Action'
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
        '303':
          description: 'Redirect after edit user action.'
          headers:
            Location:
              schema:
                type: string
              examples:
                303Success:
                  description: 'Ok. Redirect to [UI13](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/blob/eap/docs/A3.md#ui13-edit-profile)'
                  value: '/users/{username}/edit/'
                303Error:
                  description: 'Failed edition. Redirect to edit page.'
                  value: '/users/{username}/edit/'
  

  /users/{username}/edit/change-password/:
    patch:
      operationId: R109
      summary: 'R109: Change Password Action'
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
                new_password:
                  type: string
                  format: password
              required:
                - old_password
                - new_password
      
      responses:
        '303':
          description: 'Redirect after change password action.'
          headers:
            Location:
              schema:
                type: string
              examples:
                303Success:
                  description: 'Ok. Redirect to [UI13](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/blob/eap/docs/A3.md#ui13-edit-profile)'
                  value: '/users/{username}/edit/'
                303Error:
                  description: 'Failed to change password. Redirect to edit page.'
                  value: '/users/{username}/edit/'

          
  /users/{username}/edit/remove-partner/:
    patch:
      operationId: R110
      summary: 'R110: Remove partner status'
      description: 'Remove partner status. Access: USR'
      tags:
        - 'M01: Authentication and Individual Profile'
      
      parameters:
        - in: path
          name: username
          schema:
            type: string
          required: true
          
      responses:
        '303':
          description: 'Redirect after remove partner action.'
          headers:
            Location:
              schema:
                type: string
              examples:
                303Success:
                  description: 'Ok. Redirect to [UI13](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/blob/eap/docs/A3.md#ui13-edit-profile)'
                  value: '/users/{username}/edit/'
                303Error:
                  description: 'Failed to remove partner. Redirect to edit page.'
                  value: '/users/{username}/edit/'

          
  /users/{username}/edit/delete/:
    patch:
      operationId: R111
      summary: 'R110: Delete user'
      description: 'Delete user. Access: USR'
      tags:
        - 'M01: Authentication and Individual Profile'
      
      parameters:
        - in: path
          name: username
          schema:
            type: string
          required: true
          
      responses:
        '303':
          description: 'Redirect after delete user action.'
          headers:
            Location:
              schema:
                type: string
              examples:
                303Success:
                  description: 'Ok. Redirect to [US01](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/wikis/er#ui01-main).'
                  value: '/'
                303Error:
                  description: 'Failed to delete user. Redirect to edit page.'
                  value: '/users/{username}/edit/'

  
  # -------------------- M02 -------------------- 

  /news/create/:
    post:
      operationId: R201
      summary: 'R201: Create news action'
      description: 'Create news content. Access: USR'
      tags:
        - 'M02: Create/Edit Content'

      requestBody:
        required: true
        content:
          multipart/form-data:
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
                
      responses:
        '303':
          description: 'Redirect after create news post.'
          headers:
            Location:
              schema:
                type: string
              examples:
                303Success:
                  description: 'Ok. Redirect to created post [US09](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/wikis/er#ui09-post).'
                  value: '/news/{id}/'
                303Error:
                  description: 'Failed to create news post. Redirect to main page [US02](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/wikis/er#ui02-main-logged-in).'
                  value: '/'
                

  /comment/create/:
    post:
      operationId: R202
      summary: 'R202: Create comment action'
      description: 'Create comment. Access: USR, MOD'
      tags:
        - 'M02: Create/Edit Content'
      
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
                
      responses:
        '303':
          description: 'Redirect after create comment.'
          headers:
            Location:
              schema:
                type: string
              examples:
                303Success:
                  description: 'Ok. Redirect to commented post [US09](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/wikis/er#ui09-post).'
                  value: '/news/{id}/'
                303Error:
                  description: 'Failed to create comment. Redirect to post [US09](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/wikis/er#ui09-post).'
                  value: '/news/{id}/'

  /news/{id}/:
    patch:
      operationId: R203
      summary: 'R203: Edit news action'
      description: 'Edit news content. Access: OWN'
      tags:
        - 'M02: Create/Edit Content'
      
      parameters:
        - in: path
          name: id
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
              required:
                - body
                
      responses:
        '303':
          description: 'Redirect after edit news post.'
          headers:
            Location:
              schema:
                type: string
              examples:
                303Success:
                  description: 'Ok. Redirect to eddited post [US09](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/wikis/er#ui09-post).'
                  value: '/news/{id}/'
                303Error:
                  description: 'Failed. Redirect to post [US09](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/wikis/er#ui09-post).'
                  value: '/news/{id}/'
          
    delete:
      operationId: R204
      summary: 'R204: Delete News action'
      description: 'Delete News. Access: OWN'
      tags:
        - 'M02: Create/Edit Content'
        
      parameters:
        - in: path
          name: id
          schema:
            type: integer
          required: true
          
      responses:
        '303':
          description: 'Redirect after delete news post.'
          headers:
            Location:
              schema:
                type: string
              examples:
                303Success:
                  description: 'Ok. Redirect to [UI02](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/wikis/er#ui02-main-logged-in).'
                  value: '/'
                303Error:
                  description: 'Failed. Redirect to post [US09](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/wikis/er#ui09-post).'
                  value: '/news/{id}/'
           
  /comment/:
    patch:
      operationId: R205
      summary: 'R205: Edit comment action'
      description: 'Edit Comment. Access: OWN'
      tags:
        - 'M02: Create/Edit Content'
      
      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              type: object
              properties:
                id:
                  type: integer
                body:
                  type: string
              required:
                - body 
  
      responses:
        '303':
          description: 'Redirect after edit comment.'
          headers:
            Location:
              schema:
                type: string
              examples:
                303Success:
                  description: 'Ok. Redirect to commented post [US09](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/wikis/er#ui09-post).'
                  value: '/news/{id}/'
                303Error:
                  description: 'Failed. Redirect to post [US09](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/wikis/er#ui09-post).'
                  value: '/news/{id}/'

    delete:
      operationId: R206
      summary: 'R206: Delete comment action'
      description: 'Delete Comment. Access: OWN'
      tags:
        - 'M02: Create/Edit Content'
      
      parameters:
        - in: header
          name: id
          schema:
            type: integer
          required: true
          
      responses:
        '303':
          description: 'Redirect after delete comment.'
          headers:
            Location:
              schema:
                type: string
              examples:
                303Success:
                  description: 'Ok. Redirect to post [US09](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/wikis/er#ui09-post).'
                  value: '/news/{id}/'
                303Error:
                  description: 'Failed. Redirect to post [US09](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/wikis/er#ui09-post).'
                  value: '/news/{id}/'

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
          content:
            application/json:
              schema:
                type: object
                properties:
                  trending_news:
                    type: array
                    items:
                      $ref: '#/components/schemas/TrendingPost'
                  last_news:
                    type: array
                    items:
                      $ref: '#/components/schemas/Post'
                  explore:
                    type: array
                    items:
                      type: string

  /news/{id}:
    get:
      operationId: R302
      summary: 'R302: View a Specific News Post.'
      description: 'Provide Specific News Post. Access: PUB, USR, OWN, MOD'
      tags:
        - 'M03: See Users/Content'
        
      parameters:
        - in: path
          name: id
          schema:
            type: integer
          required: true
          
      responses:
        '200':
          description: 'Ok. Show [UI09](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/wikis/er#ui09-post)'
          content:
            application/json:
              schema:
                $ref: '#/components/schemas/Post'
        '404':
          description: 'News post not found.'

  /users/{username}:
    get:
      operationId: R303
      summary: "R303: View a User's profile"
      description: "Provide a User's Profile. Access: PUB, USR, MOD"
      tags:
        - 'M03: See Users/Content'
        
      parameters:
        - in: path
          name: username
          schema:
            type: string
          required: true
          
      responses:
        '200':
          description: 'Ok. Show [UI11](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/wikis/er#ui11-third-party-profile)'
          content:
            application/json:
              schema:
                type: object
                properties:
                  user:
                    $ref: '#/components/schemas/User'
                  trending_news:
                    type: array
                    items:
                      $ref: '#/components/schemas/TrendingPost'
                  last_news:
                    type: array
                    items:
                      $ref: '#/components/schemas/Post'
                  following:
                    type: array
                    items:
                      $ref: '#/components/schemas/UserPreview'
        '404':
          description: 'User not found.'
  
  /api/load-posts:
    get:
      operationId: R304
      summary: 'R304: Load More Posts'
      description: 'Load More Posts. Access: PUB, USR'
      tags:
        - 'M03: See Users/Content'
      parameters:
        - in: query
          name: pagination
          schema:
            type: integer
          required: false
        - in: query
          name: page
          schema:
            type: integer
          required: false
        - in: query
          name: sortBy
          schema:
            type: integer
          required: false
      responses:
        '200':
          description: "Return posts for pagination"
          content: 
            application/json:
              schema:
                type: object
                properties:
                  posts:
                    type: array
                    items:
                      $ref: '#/components/schemas/Post'
        '400':
          description: "Error in parameters"
                      
  /api/load-users:
    get:
      operationId: R306
      summary: 'R306: Load More Users'
      description: 'Load More Users. Access: PUB, USR'
      tags:
        - 'M03: See Users/Content'
      parameters:
        - in: query
          name: pagination
          schema:
            type: integer
          required: false
        - in: query
          name: page
          schema:
            type: integer
          required: false
        - in: query
          name: sortBy
          schema:
            type: integer
          required: false
      responses:
        '200':
          description: "Return users for pagination"
          content: 
            application/json:
              schema:
                type: object
                properties:
                  posts:
                    type: array
                    items:
                      $ref: '#/components/schemas/User'
        '400':
          description: "Error in parameters"
      
  /api/load-comments:
    get:
      operationId: R308
      summary: 'R308: Load More Comments'
      description: 'Load More Comments. Access: PUB, USR'
      tags:
        - 'M03: See Users/Content'
      parameters:
        - in: query
          name: pagination
          schema:
            type: integer
          required: false
        - in: query
          name: page
          schema:
            type: integer
          required: false
        - in: query
          name: content_id
          schema:
            type: integer
          required: true
      responses:
        '200':
          description: "Return comments for pagination"
          content: 
            application/json:
              schema:
                type: object
                properties:
                  posts:
                    type: array
                    items:
                      $ref: '#/components/schemas/Comment'
        '400':
          description: "Error in parameters"
  /api/vote/:         
    post:
      operationId: R309
      summary: 'R309: Upvote/Downvote Content'
      description: 'Upvote/Downvote content. Access: USR'
      tags:
        - 'M03: See Users/Content'
        
      parameters:
        - in: header
          name: content_id
          schema:
            type: integer
          required: true
        - in: header
          name: upvote
          schema:
            type: boolean
          required: true
                
      responses:
        '201':
          description: 'Successfully voted on content.'
          content: 
            application/json:
              schema:
                type: object
                properties:
                  posts:
                    type: array
                    items:
                      $ref: '#/components/schemas/Message'
        '401':
          description: 'Login to vote.'
          
    delete:
      operationId: R310
      summary: 'R310: Delete Vote on Content'
      description: 'Delete Vote on Content. Access: USR'
      tags:
        - 'M03: See Users/Content'

      parameters:
        - in: header
          name: content_id
          schema:
            type: integer
          required: true
          
      responses:
        '204':
          description: 'Successfully removed vote on content.'
          content: 
            application/json:
              schema:
                type: object
                properties:
                  posts:
                    type: array
                    items:
                      $ref: '#/components/schemas/Message'
        '401':
          description: 'Login to delete vote.'
  
  # -------------------- M04 -------------------- 
 
  /search/:
    get:
      operationId: R401
      summary: 'R401: Search News and Users'
      description: 'Provide News and Users Searched. Access: PUB, USR, OWN, MOD'
      tags:
        - 'M04: Search Users/Content'
        
      parameters:
        - in: query
          name: search
          schema:
            type: string
          required: false
          allowReserved: true
          
      responses:
        '200':
          description: "Ok. Show [UI10](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/wikis/er#ui10-search)"
          content: 
            application/json:
              schema:
                type: object
                properties:
                  posts:
                    type: array
                    items:
                      $ref: '#/components/schemas/Post'
                  users:
                    type: array
                    items:
                      $ref: '#/components/schemas/UserPreview'

                    

  # -------------------- M05 -------------------- 

  /notifications/:
    get:
      operationId: R501
      summary: "R501: View User's Notification"
      description: "Provide User's Notifications. Access: USR, MOD"
      tags:
        - 'M05: Notifications' 
        
      responses:
        '200':
          description: 'Ok. Show [UI15](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/wikis/er#ui15-notifications). If MOD also show [UI16](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/wikis/er#ui16-moderator-options)'
          content: 
            application/json:
              schema:
                type: object
                properties:
                  follows:
                    type: array
                    items:
                      $ref: '#/components/schemas/FollowNotification'
                  votes:
                    type: array
                    items:
                      $ref: '#/components/schemas/VoteNotification'
                  comments:
                    type: array
                    items:
                      $ref: '#/components/schemas/CommentNotification'
                  moderator:
                    type: array
                    items:
                      $ref: '#/components/schemas/ModeratorNotification'
                    default: []
        '401':
          description: 'Login to see notifications.'
          
    patch:
      operationId: R502
      summary: "R502: Mark Notification as seen"
      description: "Mark Notification as seen. Access: USR, MOD"
      tags:
        - 'M05: Notifications'
        
      parameters:
        - in: header
          name: notification
          schema:
            type: object
            properties:
              notification_type:
                type: string
              id1:
                type: integer
              id2:
                type: integer
            required:
              - notification_type
              - id1
          required: true

        
      responses: 
        '201':
          description: 'Notification marked as seen.'
        '404':
          description: 'Notification not found.'
          
    delete:
      operationId: R503
      summary: "R503: Delete Notification"
      description: "Dark Notification."
      tags:
        - 'M05: Notifications'
        
      parameters:
        - in: header
          name: notification
          schema:
            type: object
            properties:
              notification_type:
                type: string
              id1:
                type: integer
              id2:
                type: integer
            required:
              - notification_type
              - id1
          required: true
        
      responses: 
        '201':
          description: 'Notification deleted.'
        '404':
          description: 'Notification not found.'
  
  
  # -------------------- M06 --------------------
  
  /comment/report/:         
    post:
      operationId: R601
      summary: "R601: Report comment action"
      description: 'Report comment. Access: USR'
      tags:
        - 'M06: Create Requests'
        
      parameters:
        - in: header
          name: id
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
              required:
                - body 
          
      responses:
        '201':
          description: 'Report created.'
        '401':
          description: 'Login to report.'
          
  /news/{id}/report/:         
    post:
      operationId: R602
      summary: "R602: Report news action"
      description: 'Report news. Access: USR'
      tags:
        - 'M06: Create Requests'
        
      parameters:
        - in: path
          name: id
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
              required:
                - body 
          
      responses:
        '201':
          description: 'Report created.'
        '401':
          description: 'Login to report.'

  /users/{username}/report/:         
    post:
      operationId: R603
      summary: "R603: Report User action"
      description: 'Report User. Access: USR, MOD'
      tags:
        - 'M06: Create Requests'

      parameters:
        - in: path
          name: username
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
              required:
                - body 
          
      responses:
        '201':
          description: 'Report created.'
        '401':
          description: 'Login to report.'
  
  /users/{username}/partner_request/:
    post:
      operationId: R604
      summary: "R604: Create partner request action"
      description: 'Create a partner request. Access: USR, MOD'
      tags:
        - 'M06: Create Requests'
      
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
                
      responses:
        '201':
          description: 'Partner request created.'
        '401':
          description: 'Login to create a partner request.'

  /request/{username}/unban_appeal/:
    post:
      operationId: R605
      summary: "R605: Create unban appeal action"
      description: 'Create unban appeal. Access: BAN'
      tags:
        - 'M06: Create Requests'
      
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
      
      responses:
        '201':
          description: 'Unban appeal created.'
        '401':
          description: 'Login to create an unban appeal.'
  
  # -------------------- M07 --------------------

  /request/{id}/accept/:
    patch:
      operationId: R702
      summary: "R702: Accept Request"
      description: 'Accept Request. Access: MOD'
      tags:
        - 'M07: Moderator Administration'
        
      parameters:
        - in: path
          name: id
          schema:
            type: integer
          required: true
        - in: header
          name: ban_time
          schema:
            type: integer
          required: false
          
      responses:
        '201':
          description: 'Request accepted.'
        '401':
          description: 'You are not a moderator.'

  /request/{id}/reject/:
    patch:
      operationId: R703
      summary: "R703: Accept Request"
      description: 'Accept Request. Access: MOD'
      tags:
        - 'M07: Moderator Administration'
      
      parameters:
        - in: path
          name: id
          schema:
            type: integer
          required: true
          
      responses:
        '201':
          description: 'Request rejected.'
        '401':
          description: 'You are not a moderator.'
          

  # -------------------- M08 --------------------

  /faq/:
    get:
      operationId: R801
      summary: 'R801: See FAQ'
      description: 'Frequent asked questions page. Access: PUB, USR, MOD'
      tags:
        - 'M08: Static Pages'

      responses:
        '200':
          description: 'Ok. IF PUB, USR Show [UI05](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/blob/eap/docs/A3.md#ui05-faq)
                            IF MOD Show [UI06](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/blob/eap/docs/A3.md#ui06-edit-faq-as-moderator'
          content: 
            application/json:
              schema:
                type: array
                items:
                  $ref: '#/components/schemas/Faq'
                      
    post:
      operationId: R802
      summary: 'R802: Create FAQ'
      description: 'Creat frequent asked question. Access: MOD'
      tags:
        - 'M08: Static Pages'
      
      requestBody:
        required: true
        content:
          application/json:
            schema:
              type: object
              required:
                - id
                - question
                - answer
              properties:
                id:
                  type: integer
                question:
                  type: string
                answer:
                  type: string
                  
      responses:
        '303':
          description: 'Redirect after create faq.'
          headers:
            Location:
              schema:
                type: string
              examples:
                303Success:
                  description: 'Ok. Redirect to [UI06](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/blob/eap/docs/A3.md#ui06-edit-faq-as-moderator).'
                  value: '/faq/'
                303Error:
                  description: 'Failed to create faq. Redirect to [UI06](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/blob/eap/docs/A3.md#ui06-edit-faq-as-moderator).'
                  value: '/faq/'
          
    patch:
      operationId: R803
      summary: 'R802: Edit FAQ'
      description: 'Edit frequent asked question. Access: MOD'
      tags:
        - 'M08: Static Pages'
      
      requestBody:
        required: true
        content:
          application/json:
            schema:
              type: object
              required:
                - id
                - question
                - answer
              properties:
                id:
                  type: integer
                question:
                  type: string
                answer:
                  type: string
                  
      responses:
        '303':
          description: 'Redirect after edit faq.'
          headers:
            Location:
              schema:
                type: string
              examples:
                303Success:
                  description: 'Ok. Redirect to [UI06](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/blob/eap/docs/A3.md#ui06-edit-faq-as-moderator).'
                  value: '/faq/'
                303Error:
                  description: 'Failed to edit faq. Redirect to [UI06](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/blob/eap/docs/A3.md#ui06-edit-faq-as-moderator).'
                  value: '/faq/'
                  
    delete:
      operationId: R804
      summary: 'R803: Delete FAQ'
      description: 'Delete frequently asked question. Access: MOD'
      tags:
        - 'M08: Static Pages'
          
      parameters:
        - in: query
          name: id
          schema:
            type: integer
          required: true
          
      responses:
        '303':
          description: 'Redirect after delete faq.'
          headers:
            Location:
              schema:
                type: string
              examples:
                303Success:
                  description: 'Ok. Redirect to [UI06](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/blob/eap/docs/A3.md#ui06-edit-faq-as-moderator).'
                  value: '/faq/'
                303Error:
                  description: 'Failed to delete faq. Redirect to [UI06](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/blob/eap/docs/A3.md#ui06-edit-faq-as-moderator).'
                  value: '/faq/'
                
    

  /about/:
    get:
      operationId: R805
      summary: 'R804: About'
      description: 'About page. Access: PUB, USR, MOD'
      tags:
        - 'M08: Static Pages'

      responses:
        '200':
          description: 'Ok. Show [UI04](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/blob/eap/docs/A3.md#ui04-about)'
          
          
# -------------------- Components --------------------
  
components:
  schemas:
    Post:
      type: object
      properties:
        id:
          type: integer
        title:
          type: string
        image:
          type: string
        nr_votes:
          type: integer
        nr_comments:
          type: integer
        body:
          type: string
        date:
          type: string
        author:
          type: string
        partner:
          type: boolean
        deleted:
          type: boolean
          default: false
        banned:
          type: boolean
          default: false
        tags:
          type: array
          items:
            type: string
        comments:
          type: array
          items:
            $ref: '#/components/schemas/Comment'
          default: []
          
    TrendingPost:
      type: object
      properties:
        id:
          type: integer
        title:
          type: string
        image:
          type: string
        date:
          type: string
        author:
          type: string
        partner:
          type: boolean


    UserPreview:
      type: object
      properties:
        id:
          type: integer
        username:
          type: string
        partner:
          type: boolean
        photo:
          type: string
        reputation:
          type: string
    
    User:
      type: object
      properties:
        username:
          type: string
        description:
          type: string
        photo:
          type: string
        deleted:
          type: boolean
        banned:
          type: boolean
        reputation:
          type: integer
        partner:
          type: boolean
        moderator:
          type: boolean
    
    UserEdit:
      type: object
      properties:
        username:
          type: string
        description:
          type: string
        photo:
          type: string
        deleted:
          type: boolean
        banned:
          type: boolean
        reputation:
          type: integer
        partner:
          type: boolean
        moderator:
          type: boolean
        email:
          type: string
        birthdate:
          type: string
        gender:
          type: string
          
    Comment:
      type: object
      properties:
        id:
          type: integer
        body:
          type: string
        date:
          type: string
        nr_votes:
          type: integer
        username:
          type: string
        partner:
          type: boolean
        deleted:
          type: boolean
        banned:
          type: boolean
        reply_to:
          type: integer
        
    FollowNotification:
      type: object
      properties:
        follower_id:
          type: string
        is_new:
          type: boolean
        date:
          type: string
    
    VoteNotification:
      type: object
      properties:
        voter_id:
          type: string
        content_id:
          type: integer
        is_new:
          type: boolean
        date:
          type: string

      
    CommentNotification:
      type: object
      properties:
        comment_id:
          type: integer
        is_new:
          type: boolean
        date:
          type: string


    ModeratorNotification:
      type: object
      properties:
        id:
          type: integer
        from_id:
          type: string
        moderator_id:
          type: string
        reason:
          type: string
        creation_date:
          type: string
        status:
          type: string
        revision_date:
          type: string
        to_users_id:
          type: string
        to_content_id:
          type: integer
        ban_id:
          type: integer
          
    Faq:
      type: object
      properties:
        id:
          type: integer
        question:
          type: string
        answer:
          type: string
          
    Message:
      type: object
      properties:
        status:
          type: boolean
        message:
          type: string
```



---


## A8: Vertical prototype

The Artificat A8 (Vertical Prototype) includes the implementation of some user stories and aims to validate the architecture presented.

### 1. Implemented Features

#### 1.1. Implemented User Stories

| User Story reference | Name                   | Priority                   | Description                   |
| -------------------- | ---------------------- | -------------------------- | ----------------------------- |
| US04                 | Search Using Keywords | High | As an *User*, I want to search news and user profiles, so that I can find news/users related to the keywords used on the search. |
| US07                 | View Specific Post | High | As an *User*, I want to be able to view one news, so that I can see all the information related to that post (commments, entire description, author, author reputation, etc.). |
| US11                 | Sign-in | High | As a *Guest*, I want to authenticate into the system, so that I can access privileged information. |
| US12                 | Register | High | As a *Guest*, I want to register into the system, so that I can authenticate myself into the system. |
| US22                 | Create News | High | As an *Autheticated User*, I want to create News, so that it is publicly available. |
| US27                 | Sign Out | High | As an *Authenticated User*, I want to sign out of the system, so that I can become a guest. |
| US31                 | Edit New | High | As a *Author*, I want to edit a post I previously posted, so that I can keep the information updated. |
| US32                 | Remove New | High | As a *Author*, I want to remove a post I previously posted, so that it is no longer publicly available. |

#### 1.2. Implemented Web Resources

**M01: Authentication and Individual Profile** 

| Web Resource Reference | URL                            |
| ---------------------- | ------------------------------ |
| R101: Login Form | GET /login/ |
| R102: Login Action | POST /login/ |
| R103: Logout Action | POST /logout/ |
| R105: See Register Form | GET /register/ |
| R106: Register Action | POST /register/ |

**M02: Create/Edit Content**

| Web Resource Reference | URL                            |
| ---------------------- | ------------------------------ |
| R201: Create news action | POST /news/create/ |
| R203: Edit news action | PATCH /news/{id}/ |
| R204: Delete news action | DELETE /news/{id}/ |

**M03: See Users/Content**

| Web Resource Reference | URL                            |
| ---------------------- | ------------------------------ |
| R302: View a Specific News Post | GET /news/{id}/ |

**M04: Search Users/Content**

| Web Resource Reference | URL                            |
| ---------------------- | ------------------------------ |
| R401: Search News and Users | GET /search/ |

### 2. Prototype

The prototype is available at http://lbaw2114.lbaw-prod.fe.up.pt/

Credentials:
- **Moderator**: 
  - Username: ricardo
  - Password: test1234
- **Partner**:
  - Username: andre
  - Password: test1234
- **Authenticated User**:
  - Username: joao
  - Password: test1234
  
The code is available at https://git.fe.up.pt/lbaw/lbaw2021/lbaw2114/-/tree/master/xekkit


---


## Revision history

Changes made to the first submission (03/05/2021):


***
GROUP2114, 03/05/2021
 
 - Beatriz Mendes, up201806551@fe.up.pt (A7 editor)
 - Guilherme Calassi, up201800157@fe.up.pt
 - Luís André Assunção, up201806140@fe.up.pt (A8 editor)
 - Ricardo Cardoso, up201604686@fe.up.pt
