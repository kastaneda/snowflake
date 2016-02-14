
# Snowflake Project

Here you can see some weird RESTful API, written explicitly for testing
purposes. I, author of the code, keep it on public repository just for
my convenience.

## Installation

```bash
git clone https://github.com/kastaneda/snowflake.git
cd snowflake/
vagrant up
```

## API Schema (Draft)

### Get votes

```
GET /api/v1/vote
```

```
curl http://127.0.0.1:8080/api/v1/vote
```

 - 200: get current voting statistic

### User registration

```
PUT /api/v1/user/{login}
```

```
curl -X PUT -H 'Content-Type: application/json' \
  -d '{"name":"Dmitry","password":"test01"}' \
  http://127.0.0.1:8080/api/v1/user/tester
```

 - 400: login/password/other data validation error
 - 409: login is already taken
 - 201: user account successfully created

### Cast a vote

 - Requires HTTP authentication

```
PUT /api/v1/vote/{login}
```

```
curl -X PUT -H 'Content-Type: application/json' \
  -d '{"genre":"Electric"}' \
  http://127.0.0.1:8080/api/v1/vote/tester
```

 - 403: login in URL != login in HTTP auth
 - 409: has already voted
 - 201: successfully voted
