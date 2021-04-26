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

OpenAPI YAML: [link](../xekkit/xekkit-api.yaml)
OpenAPI Swagger: [link](https://app.swaggerhub.com/apis/lbaw2114/lbaw-xekkit_web_api/1.0)

```yaml
work in progress. see xekkit-api.yaml for more details.

```


---


## A8: Vertical prototype

The Artificat A8 (Vertical Prototype) includes the implementation of some user stories and aims to validate the architecture presented.

### 1. Implemented Features

#### 1.1. Implemented User Stories

> Perguntar: Implementamos a ABOUT, FAQ? São Low Priority

| User Story reference | Name                   | Priority                   | Description                   |
| -------------------- | ---------------------- | -------------------------- | ----------------------------- |
| US04                 | Search Using Keywords | High | As an *User*, I want to search news and user profiles, so that I can find news/users related to the keywords used on the search. |
| US06                 | View Profiles | High | As an *User*, I want to be able to view a profile, so that I can see the news posted by a certain user and his main information (username, achievements, date of the creation of the account) |
| US11                 | Sign-in | High | As a *Guest*, I want to authenticate into the system, so that I can access privileged information. |
| US12                 | Register | High | As a *Guest*, I want to register into the system, so that I can authenticate myself into the system. |
| US25                 | Manage Profile | High | As an *Authenticated User*, I want to change my profile information (including my password), so that it can stay updated. |
| US27                 | Sign Out | High | As an *Authenticated User*, I want to sign out of the system, so that I can become a guest. |
| US29                 | Delete Profile | High | As an *Authenticated User*, I want to be able to delete my profile, so that my profile page and account no longer exists. |

#### 1.2. Implemented Web Resources

**M01: Authentication and Individual Profile** 

| Web Resource Reference | URL                            |
| ---------------------- | ------------------------------ |
| R101: Login Form | /login |
| R102: Login Action | POST /login |
| R103: Logout Action | POST /logout |
| R106: Register Form | /register |
| R107: Register Action | POST /register |
| R109: Edit User Profile Form | /users/{username}/edit |
| R110: Edit User Profile Action | POST /users/{username}/edit |
| R111: Delete Profile Action | --- |

**M03: See Users/Content**

| Web Resource Reference | URL                            |
| ---------------------- | ------------------------------ |
| R303: View a User's Profile. | /users/{username} |

**M04: Search Users/Content**

| Web Resource Reference | URL                            |
| ---------------------- | ------------------------------ |
| R401: Search News and Users | /search |

### 2. Prototype

The prototype is available at ***INSERT LINK TO PRODUCTION HERE***

Credentials:
    - Moderator: ***USERNAME/PASSWORD***
    - Authenticated User: ***USERNAME/PASSWORD***
    - Partner: ***USERNAME/PASSWORD***

The code is available at ***INSERT LINK TO GITLAB-PROTOTYPE HERE***


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
