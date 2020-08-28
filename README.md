Project7-OPC-bilemo

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/13ee4579cc6941dbb0c4e36afa2e199a)](https://app.codacy.com/manual/Magali-Rezeau/Project7-OPC-bilemo?utm_source=github.com&utm_medium=referral&utm_content=Magali-Rezeau/Project7-OPC-bilemo&utm_campaign=Badge_Grade_Dashboard)

BileMo is a company offering a variety of premium mobile phones.
BileMo's business model is not to sell its products directly on the website, but to provide all platforms that want it with access to the catalog via an API (Application Programming Interface). It is therefore exclusively B2B (business to business) sales.

## Installation
1. Clone and download the repository GitHub :
```
    git clone https://github.com/Magali-Rezeau/Project7-OPC-bilemo.git
```
2. Configure your environment variables such as connection to the database or your SMTP server in the file `.env`.

3. Download and install the back-end dependencies of the project with [Composer](https://getcomposer.org/download/) :
```
    composer install
```
4. Create the database if it does not already exist, type the command below :
```
    php bin/console doctrine:database:create
```
5. Create the different tables in the database by applying migrations :
```
    php bin/console doctrine:migrations:migrate
```
6. Install fixtures to have a fictional data demo :
```
    php bin/console doctrine:fixtures:load
```
7. Generate the SSH keys with JWT :
```
    $ mkdir -p config/jwt
    $ openssl genpkey -out config/jwt/private.pem -aes256 -algorithm rsa -pkeyopt rsa_keygen_bits:4096
    $ openssl pkey -in config/jwt/private.pem -out config/jwt/public.pem -pubout
```
    You must put the key you chose in the .env file

## Usage
1. You can test getting the token with a simple curl command like this (adapt host and port) :
```
    curl -X POST -H "Content-Type: application/json" http://localhost/api/login_check -d '{"username":"john@doe.com","password":"test"}'
```
2. If it works, you will receive something like this :
```
    {
        "token" : "eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXUyJ9.eyJleHAiOjE0MzQ3Mjc1MzYsInVzZXJuYW1lIjoia29ybGVvbiIsImlhdCI6IjE0MzQ2NDExMzYifQ.nh0L_wuJy6ZKIQWh6OrW5hdLkviTs1_bau2GqYdDCB0Yqy_RplkFghsuqMpsFls8zKEErdX5TYCOR7muX0aQvQxGQ4mpBkvMDhJ4-pE4ct2obeMTr_s4X8nC00rBYPofrOONUOR4utbzvbd4d2xT_tj4TdR_0tsr91Y7VskCRFnoXAnNT-qQb7ci7HIBTbutb9zVStOFejrb4aLbr7Fl4byeIEYgp2Gd7gY"
    }
```   
3. Authentication :
```
    curl -H "Authorization: Bearer {yourtoken}" {yourdomain}/api
```
4. Check out the api :
```
    http://localhost:{yourport}/api
```   
5. Documentation :
    Click on Token : POST/api/login_check and click on the button : Try it out
    Enter username and password 
```
    {
        "username": "api",
        "password": "api"
    }
```  
    Click on the button : Execute and get the token
    Click on the button : Authorize and enter token
```
    Bearer %yourtoken%
```  
6. You can also use Postman
