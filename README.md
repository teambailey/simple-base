##### First:
### npm install

-------


##### Then:
### gulp makie
###### (run only once. its a reset. don't mess with it)

-------


##### After that:
### gulp 

-------


##### Once you have created something... great... I guess:
### gulp build:prod

-------


##### If you are returning after "makie", just use:
### gulp

-------


##### Zsh function for auto-build:
generateSimpleBase(){
  git clone https://github.com/teambailey/simple-base.git $1 && cd $1/ && npm i && gulp makie && gulp
}
