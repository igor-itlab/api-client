# api-client

Api-client for communication between services

## Getting Started

These instructions will cover usage information and for the docker container 

### Prerequisities

In order to run this container you'll need docker installed.

* [Windows](https://docs.docker.com/windows/started)
* [OS X](https://docs.docker.com/mac/started/)
* [Linux](https://docs.docker.com/linux/started/)

### Usage

Add composer package 

```shell script
composer require itlab-studio/api-client
```

It will add a new composer package and install bundle 'api-client'


Add .env config (.env.local possible)

```yaml
            CP_PRIVATE_TOKEN_EXPIRES=xxx
            CP_PUBLIC_TOKEN_EXPIRES=xxx
            
            JWT_TOKEN_EXPIRES_TIME=xxx
            JWT_CONTROL_PANEL_ID='xxxx-xxxx-xxxx-xxxx-xxxx-xxxx-xxxx'
            JWT_CONTROL_PANEL_SECRET='xxxx-xxxx-xxxx-xxxx-xxxx-xxxx-xxxx'
            
            CP_CLIENT_DOMAIN_NAME='https://api-host.com'
```


Then please add some variables into services.yaml

```yaml
services:
    # default configuration for services in *this* file
    _defaults:
        autowire: true      # Automatically injects dependencies in your services.
        autoconfigure: true # Automatically registers your services as commands, event subscribers, etc.
        bind:
            $controlPanelID: '%env(JWT_CONTROL_PANEL_ID)%'
            $controlPanelSecret: '%env(JWT_CONTROL_PANEL_SECRET)%'
            $expiresTime: '%env(JWT_TOKEN_EXPIRES_TIME)%'
  
    #this record is temporary but require
    ItlabStudio\ApiClient\Service\ApiClient: '@itlab_studio_api_client_service.api_client'

```
