## Laravel support package

A Laravel support package with some nice to have extensions.

### Installation

Add `"stayallive/support" : "1.*"` to your composer.json.

Then follow the usage instructions for each component listed below...

### Blade extensions

#### Installation

Add `'Stayallive\Support\Blade\BladeServiceProvider'` to the providers section in your `app.php` config file.

#### Provides

- @set('varname', $value)

### Gravatar

#### Installation

Add `'Stayallive\Support\Gravatar\GravatarServiceProvider'` to the `providers` section in your `app.php` config file.

Add `'Gravatar': 'Stayallive\Support\Gravatar\GravatarFacade'` to the `aliases` section in your `app.php` config file.

#### Usage

##### Get a gravatar image url
```
/**
 * Build a gravatar url.
 *
 * @param        $email
 * @param int    $size
 * @param string $default
 * @param bool   $https
 *
 * @return string
 */
public function buildURL($email, $size = 100, $default = \Gravatar::DEFAULT_MYSTERYMAN, $https = true) { ... }
```

So you can call this like `Gravatar::buildUrl($email, 500, Gravatar::DEFAULT::IDENTICON)` to get a 500x500 image that defaults to a [Identicon](http://en.wikipedia.org/wiki/Identicon).

#### Check if a user has a Gravatar set
```
if (Gravatar::exists($email)) {
    echo 'Yep, this one has a pretty face set!';
} else {
    echo 'No, no, no, this one does not want to be seen!';
}
```