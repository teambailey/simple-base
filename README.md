# Simple Base 
### Fast setup for a simple framework used for quick build outs than can be production ready if required

#### Get dependencies
```
npm install
```
#### Then run constructor
```
gulp makie
```
#### During development run
```
gulp
```
#### For a production ready build
```
gulp build:prod
```
-------
#### Zsh function for auto-build
```
generateSimpleBase(){git clone https://github.com/teambailey/simple-base.git $1 && cd $1/ && npm i && gulp makie && gulp}
```
#### Auto-build command line use
```
generateSimpleBase ${ newDirectoryName }
```
