# Anilo Test Api

## AUTH

| Service Name  | Service API |
| ------------- | ------------- |
| Login | {{baseUrl}}/Login (POST)  |

### Authorization
Authorization: Username And Password

### Message Request Response
**Request :**
```
{
	"username": "anilo",
	"password": "anilo2021-tilltheend",
}
```
**Response Success :**
``` 
Http Code 200
{

    "result": "OK",
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VybmFtZSI6ImFuaWxvIiwibmFtZSI6InNhbmRpIiwiZXhwaXJlc19pbiI6MTYyODc4NTA5NCwicmVmcmVzaF90dGwiOjE2Mjg3ODUwOTR9.5OrHPpM072P4IPi1FxMdBU2bCZEC1Q0sdLiqFZam6Iw",
    "token_type": "bearer",
    "expires_in": 1628785094
}
```

**Response gagal :**
``` 
Http code 510
{
    "result": "FAILED",
    "responseMessage": "Invalid username and Password"
}
```

### Mapping Error
| HTTP Code | Response Message |
| ------------- | ------------- |
| 200 |OK|
| 510 |FAILED      |


## USER

| Service Name  | Service API |
| ------------- | ------------- |
| Profile | {{baseUrl}}/profile (GET)  |

### Authorization
Authorization: bearer [TOKEN]

**Response Success :**
``` 
Http Code 200
{
    "result": "OK",
    "username": "sanditriana",
    "name": "sandi"
}
```

**Response gagal :**
``` 
Http code 510
{
    "result": "FAILED",
    "responseMessage": "Token Invalid Signature"
}
```

### Mapping Error
| HTTP Code | Response Message |
| ------------- | ------------- |
| 200 |OK|
| 510 |FAILED      |
