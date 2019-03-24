# Contributing to OANDA Client

Thank you for your contributions!!!

## Setting up the project locally
If you want to contribute, the first step is to get this project set up locally and run the tests. This project comes
with:

* PHP 7.1 Docker image
  * XDebug
  * Composer
* Docker-compose file
* Makefile

### Dependencies
* > PHP 7.1.3
* It is recommended (not required) that you have Docker installed to run the container image

#### Bring up the project container
`make`

#### Exec into the container
`make php`

#### Build project dependencies
`make build`

#### Run project tests
`make test`

#### Clear cache
`make clear`

#### Formatting
`make fix-cs`

## Squash your commits
In order to keep the commit history orderly, please squash your commits

```bash
git fetch upstream
git rebase -i upstream/master # squash your commits by setting "pick" to "fixup" or "f"
git push -f <your branch name>
```

## Setting up XDebug
The docker container that comes with this project comes with XDebug installed. The XDebug Configuration for running locally
is set up in the `.env.dist` file. You may need to make changes in the `.env` file to get it configured to run locally.

The default XDebug Configuration is
```bash
XDEBUG_CONFIG=remote_enable=on remote_port=9001 idekey=docker remote_host=10.0.2.2
```
You may have to change your remote host (use your host IP from `ifconfig`)

If you're using PhpStorm, configure the XDebug Port to 9001

```text
File -> Settings -> Languages & Frameworks -> PHP -> Debug
```

Also Configure a server with name `docker`
```text
File -> Settings -> Languages & Frameworks -> PHP -> Servers

Name = docker
Host = localhost
Debugger = XDebug
Check "Use path mappings"
- Absolute path on server should be equal to "/srv" 
```