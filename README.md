
Installation
============

```bash
git clone https://github.com/kastaneda/snowflake.git
cd snowflake/
vagrant up
```


API scheme draft
================

Without HTTP authorization:

    PUT /api/v1/user/{login}
        400: login/password/other data validation error
        409: login is already taken
        201: user account successfully created

    GET /api/v1/vote
        200: get current voting info

HTTP authorization required:

    PUT /api/v1/vote/{login}
        403: login in URL != login in HTTP auth
        409: has already voted
        201: successfully voted

Other optional endpoints (with authorization):

    GET /api/v1/user
        200: list all users
        only for admin?

    GET /api/v1/user/{login}
        200: some user info
        404: user not found
        admin/oneself/everyone?

    PUT /api/v1/user/{login}
        TBD: users should be able to update their info (password etc)
        TBD: admin should be able to update any user info
        400: validation error
        404: user not found
        200: OK

    DELETE /api/v1/user/{login}
        TBD: users should be able to remove themselves
        TBD: admin should be able to remove any users
        404: user not found

    DELETE /api/v1/vote/{login}
        403: login in URL != login in HTTP auth
        404: vote not found
        200: successfully deleted


Ответы на незаданные вопросы
============================

Q: Почему «snowflake»?

A: Потому что в условии были нарисованы [какие-то гитары](https://youtu.be/C4PXHWjhgAA).
