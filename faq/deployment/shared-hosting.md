# How can I deploy Laravel to a shared hosting?

To deploy Laravel to a shared hosting you have two methods:

## Method 1
* copy Laravl in the folder **parent** of `public_html`
* remove the `public_html` folder
* move your `public` folder to `public_html`
* change the file `bootstrap/paths.php` on line 29 from `'public' => __DIR__.'/../public',` to `'public' => __DIR__.'/../public_html',`

## Method 2
* copy Laravl in the folder **parent** of `public_html`
* remove the `public_html` folder
* make `public_html` as a symbolic link of `public`

{"tags": ["asd", "lol", "rotfl"]}
