# forge-cli
> Deploy your [Forge](forge.laravel.com) sites from the command line.

## Installation

The prefered method is to install this package globally

`composer global require bramdevries/forge-cli`

## Usage

After installing you can use the `forge` command. It has 2 commands, `add` and `deploy`. The intended use is to store all forge sites on a per-project basis. 

#### Add

This command is used to add a new site to your configuration. If it is the first time you run this command it will create a directory `.forge-cli` containing `sites.json` in the directory you ran the command.

You can pass all of the required variables by using the options:

`forge add --server 1 --site 1 --token <secret_token> --name mycoolsite`

If you omit an option, you will be prompted to answer it.

![question series](http://s.2to1.be/YCie/Image%202014-10-25%20at%208.32.38%20PM.png)

#### Deploy

This command will start the deployment of your forge site. You simply run

`forge deploy mycoolsite`

If you see an OK message appear it means your site has started deploying. 

## Notes

This tool was build for my own personal needs, if you have ideas about a feature please create an issue or a pull request. 
