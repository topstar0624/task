# CodeIgniter Composer Installer

[![Latest Stable Version](https://poser.pugx.org/kenjis/codeigniter-composer-installer/v/stable)](https://packagist.org/packages/kenjis/codeigniter-composer-installer) [![Total Downloads](https://poser.pugx.org/kenjis/codeigniter-composer-installer/downloads)](https://packagist.org/packages/kenjis/codeigniter-composer-installer) [![Latest Unstable Version](https://poser.pugx.org/kenjis/codeigniter-composer-installer/v/unstable)](https://packagist.org/packages/kenjis/codeigniter-composer-installer) [![License](https://poser.pugx.org/kenjis/codeigniter-composer-installer/license)](https://packagist.org/packages/kenjis/codeigniter-composer-installer)

This package installs the offical [CodeIgniter](https://github.com/bcit-ci/CodeIgniter) (version `3.1.*`) with secure folder structure via Composer.

You can update CodeIgniter system folder to latest version with one command.

## Folder Structure

```
codeigniter/
├── application/
├── composer.json
├── composer.lock
├── public/
│   ├── .htaccess
│   └── index.php
└── vendor/
    └── codeigniter/
        └── framework/
            └── system/
```

## Requirements

* PHP 5.3.7 or later
* `composer` command (See [Composer Installation](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx))
* Git

## How to Use

### Install CodeIgniter

```
$ composer create-project kenjis/codeigniter-composer-installer codeigniter
```

Above command installs `public/.htaccess` to remove `index.php` in your URL. If you don't need it, please remove it.

And it changes `application/config/config.php`:

~~~
$config['composer_autoload'] = FALSE;
↓
$config['composer_autoload'] = realpath(APPPATH . '../vendor/autoload.php');
~~~

~~~
$config['index_page'] = 'index.php';
↓
$config['index_page'] = '';
~~~

#### Install Translations for System Messages

If you want to install translations for system messages:

```
$ cd /path/to/codeigniter
$ php bin/install.php translations 3.1.0
```

#### Install Third Party Libraries

[Codeigniter Matches CLI](https://github.com/avenirer/codeigniter-matches-cli):

```
$ php bin/install.php matches-cli master
```

[CodeIgniter HMVC Modules](https://github.com/jenssegers/codeigniter-hmvc-modules):

```
$ php bin/install.php hmvc-modules master
```

[Modular Extensions - HMVC](https://bitbucket.org/wiredesignz/codeigniter-modular-extensions-hmvc):

```
$ php bin/install.php modular-extensions-hmvc codeigniter-3.x
```

[Ion Auth](https://github.com/benedmunds/CodeIgniter-Ion-Auth):

```
$ php bin/install.php ion-auth 2
```

[CodeIgniter3 Filename Checker](https://github.com/kenjis/codeigniter3-filename-checker):

```
$ php bin/install.php filename-checker master
```

[CodeIgniter Rest Server](https://github.com/chriskacerguis/codeigniter-restserver):

```
$ php bin/install.php restserver 2.7.2
```

### Run PHP built-in server (PHP 5.4 or later)

```
$ bin/server.sh
```

### Update CodeIgniter

```
$ cd /path/to/codeigniter
$ composer update
```

You must update files manually if files in `application` folder or `index.php` change. Check [CodeIgniter User Guide](http://www.codeigniter.com/user_guide/installation/upgrading.html).

## Reference

* [Composer Installation](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)
* [CodeIgniter](https://github.com/bcit-ci/CodeIgniter)
* [Translations for CodeIgniter System](https://github.com/bcit-ci/codeigniter3-translations)

## Related Projects for CodeIgniter 3.0

* [Cli for CodeIgniter 3.0](https://github.com/kenjis/codeigniter-cli)
* [ci-phpunit-test](https://github.com/kenjis/ci-phpunit-test)
* [CodeIgniter Simple and Secure Twig](https://github.com/kenjis/codeigniter-ss-twig)
* [CodeIgniter Doctrine](https://github.com/kenjis/codeigniter-doctrine)
* [CodeIgniter Deployer](https://github.com/kenjis/codeigniter-deployer)
* [CodeIgniter3 Filename Checker](https://github.com/kenjis/codeigniter3-filename-checker)
* [CodeIgniter Widget (View Partial) Sample](https://github.com/kenjis/codeigniter-widgets)


---

# 星先初期設定

## GitHubにリポジトリを作成(すでにあれば不要)

`Initialize this repository with a README` にチェックいれると  
最初から `README.md` を作成してくれる。  
今回はなくてもいいかな。

`Add .gitignore` で `CodeIgnitor` を選んであげると、  
勝手に `.gitignore` を用意してくれる。

緑色の `Clone or Download` ボタンから `SSH key` を取得できる。あとで使う。

## Cloud9でworkspaceを作成

`Workspace name` 入力  
`Description` workspaceの説明だけどなくてもいい  
`Clone from Git or Mercurial URL` さっきの `SSH key` を貼り付け  
`Choose a template` phpを選択

## Cloud9の設定

基本defaultを使ってる。  
`Preferences` の `EXPERIMENTAL` で `Auto-Save` をON。  
workspaceツリー右上の歯車から、 `Show Hidden Files` にチェックを追加。

## Composerをインストール

下記を参考にした  
http://cloud-collector.link/2016/07/codeigniter-in-cloud9/  
http://blog.a-way-out.net/blog/2015/12/06/install-codeigniter/

```
$ curl -sS https://getcomposer.org/installer | php
$ sudo php5dismod xdebug
```

## ComposerでCodeIgnitorをインストール

```
$ composer create-project kenjis/codeigniter-composer-installer codeigniter
```

  codeigniterフォルダが自動で作られる。  
このままだとwelcomeが (URL)/codeigniter/public になってしまう。  
codeigniterフォルダの中身をルートの直下に置きたい。

GitHubで生成された `.gitignore` とcodeigniterフォルダ直下の `.gitignore` を合体させた上で、
codeigniterフォルダの中身をルート直下に移動させて、空になったcodeigniterフォルダを削除した。  
たぶん問題ないと思う。

## 追加コンポーネントのインストール

よく分からないけど便利らしいので、続けて↓

```
$ bin/my-codeigniter.sh
```

## ルートの変更

このままだとまだwelcomeが (URL)/public のまま。  
welcomeは(URL)直下で表示してほしい！

```
$ sudo vim /etc/apache2/sites-available/001-cloud9.config
i //vimをインサートモードにする
```

`DocumentRoot /home/ubuntu/workspace/` を  
`DocumentRoot /home/ubuntu/workspace/public/` に修正。

```
esc //通常モードに戻る
ZZ //保存して閉じる
```

Apacheを再起動して無事表示できた。

## GitHubに最初のpush

```
$ git init
$ git add .
$ git commit -m "コミットメッセージ"
$ git remote add origin gitの SSH key をコピペ
$ git commit
$ git push -u origin master
```


---

# 星先今後やること

## 一区切りついたらGitHubにpush

Gitコマンド一覧はここが分かりやすかった
http://qiita.com/fukumone/items/73e1a9a62c5e4454263b

`$ git status`  
前回のコミットと比較してどのファイルが変更されたかを確認(飛ばしてもOK)

`$ git add .`  
すべての変更をstageに追加

`$ git commit -m “コミットメッセージ”`  
コミットメッセージを指定してコミット

`$ git push origin master`  
masterブランチにpush

## 使うかもしれないGitコマンド

`$ git reset HEAD`
git addを取り消す

## URLがうまく使えないことがあれば

もしかしたら  
`application/config/config.php` の  
`$config['base_url'] = '';` を  
`$config['base_url'] = 'http://(URL)';` に変更する必要があるかも。

> これをやらないと例えばecho form_open()みたいなタグを使った時に、URLがIPアドレスで出力されてしまってうまく動かなくなります。

って記述が参考サイトにあったため。

## CodeIgniterがバージョンアップしてたら

composerを使ってアップデートするといい。

```
$ composer update
```