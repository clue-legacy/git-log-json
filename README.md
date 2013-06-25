# git-log-json

Export git log as JSON

## Usage

Once [installed](#install), you can run `git-log-json` by issuing:

`php git-log-json.phar [project directory to export]`

## Install

You can grab a copy of clue/git-log-json in either of the following ways.

### As a phar (recommended)

You can simply download a pre-compiled and ready-to-use version as a Phar
to any directory:

```bash
$ wget http://www.lueck.tv/git-log-json/git-log-json.phar
```

> If you prefer a global (system-wide) installation without having to type the `.phar` extension
each time, you may invoke:
> 
> ```bash
> $ chmod 0755 git-log-json.phar
> $ sudo mv git-log-json.phar /usr/local/bin/git-log-json
> ```
>
> You can verify everything works by running:
> 
> ```bash
> $ git-log-json
> ```

#### Updating phar

There's no separate `update` procedure, simply overwrite the existing phar with the new version downloaded.

### Manual Installation from Source

The manual way to install `git-log-json` is to clone (or download) this repository
and use [composer](http://getcomposer.org) to download its dependencies.
Obviously, for this to work, you'll need PHP, git and curl installed:

```bash
$ sudo apt-get install php5-cli git curl
$ git clone https://github.com/clue/git-log-json.git
$ curl -s https://getcomposer.org/installer | php
$ php composer.phar install
```

> If you want to build the above mentioned `git-log-json.phar` yourself, you have
to install [clue/phar-composer](https://github.com/clue/phar-composer#install)
and can simply invoke:
>
> ```bash
> $ php phar-composer.phar build ~/workspace/git-log-json
> ```

#### Updating manually

If you have followed the above install instructions, you can update `git-log-json` by issuing the following two commands:

```bash
$ git pull
$ php composer.phar install
```

## License

MIT-licensed

